import 'bootstrap'

window._ = require('lodash')
window.$ = window.jQuery = require('jquery')
window.axios = require('axios')
window.toastr = require('toastr')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
