window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
import axios from 'axios'
import createAuthRefreshInterceptor from 'axios-auth-refresh'

const getCSRFToken = () => {
  const token = document.head.querySelector(
    'meta[name="csrf-token"]'
  )
  return token?.content
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'
//axios.defaults.withCredentials = true

const token = getCSRFToken()

if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token
} else {
  console.error(
    'CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token'
  )
}

// The following code adds an interceptor that renews the CSRF token whenever
// the app recieves a token mismatch error
const refreshCSRFToken = () => {
  return new Promise((resolve, reject)=> {
    console.log('Token expired, fetching a new one')
    axios
      .get('/')
      .then(({ data }) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = data
        return wrapper
          .querySelector('meta[name=csrf-token]')
          ?.getAttribute('content')
      })
      .then((token) => {
        document
          .querySelector('meta[name=csrf-token]')
          ?.setAttribute('content', token || '')
        resolve()
      })
      .catch(() => reject())
  })
}

createAuthRefreshInterceptor(axios, refreshCSRFToken, {
  statusCodes: [419],
})

// Using a second interceptor to inject the newly fetched CSRF token to all requests
axios.interceptors.request.use((request) => {
  request.headers['X-CSRF-TOKEN'] = getCSRFToken()
  return request
})