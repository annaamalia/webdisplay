/**
 * Always minify this helper if there is an update..
 * https://jscompress.com/
 * note: enable -> ECMAScript *year* (via babel-minify)
 */

var hl,
  help,
  helper = help = hl = {
    /**
     * Get content of CSRF token
     */
    token: document
      .querySelector('meta[name=csrf-token]')
      .getAttribute('content'),

    /**
     * @param {string} id
     * @param {Object} options
     * 
     * @return DataTable
     */
    datatable: (id, options) => $('#' + id).DataTable({
      destroy: true,
      processing: true,
      serverSide: true,
      bInfo: false,
      autoWidth: false,
      scrollCollapse: true,
      pageLength: 10,
      pagingType: 'full_numbers',
      dom: '<"top"f>rt<"top"flp><"clear">',
      scrollX: true,
      ...options,
    }),

    /**
     * format array:
     * 1. ['id', 'name', 'email']
     * 2. [
     *  'column_name|obj_one:"this is string",obj_two:69420',
     *  'action|orderable:false,searchable:false'
     * ]
     * @param {string[]} array
     *
     * @return {Object} result:
     * 1. [
     *  { data: 'DT_RowIndex', name: 'DT_RowIndex' },
     *  { data: 'name', name: 'name' },
     *  { data: 'email', name: 'email' }
     * ]
     * 2. [
     *  { data: 'column_name', name: 'column_name', obj_one: 'this is string', obj_two: 69420 },
     *  { data: 'action', name: 'action', orderable: false, searchable: false }
     * ]
     */
    mapColumns: array => array.map(i => {
      var data = i.split('|'),
        options = data?.[1]
          ? data[1].split(',').map(j => {
            var temp = j.split(':'),
              value = temp[1] === 'true'
                ? true
                : temp[1] === 'false'
                  ? false
                  : !isNaN(temp[1])
                    ? Number(temp[1])
                    : temp[1]

            return { key: temp[0], value }
          })
          : [],
        objOptions = {}

      if (options.length > 0) options.forEach(j => {
        objOptions[j.key] = j.value
      })

      return {
        data: data[0].toLowerCase() === 'id' ? 'DT_RowIndex' : data[0],
        name: data[0].toLowerCase() === 'id' ? 'DT_RowIndex' : data[0],
        ...objOptions,
      }
    }),

    /**
     * @param {string} url
     * @param {any | FormData} data
     * @param {'GET' | 'POST' | 'DELETE' | 'PUT' | 'PATCH'} method
     * @param {Object} options
     * 
     * @return {Promise}
     */
    api: (url, data, method = 'GET', options = {}) => new Promise(dispatch =>
      dispatch(
        $.ajax({
          type: method,
          url,
          data,
          ...options
        })
      )
    ),

    /**
     * @param {string} formSelector
     * 
     * @return {Object}
     */
    toDataObj: formSelector => {
      var data = {}

      $(formSelector).serializeArray().forEach(i => {
        data[i.name] = i.value
      })

      return data
    },

    /**
     * @param {string} content
     * @param {string} title
     * 
     * @return {void}
     */
    modal: (content, title = MODAL_TITLE_TEMPLATE) => showModalError(title, content),

    /**
     * @param {Object} obj
     * 
     * @return {string}
     */
    object_encode: obj => btoa(JSON.stringify(obj)),

    /**
     * @param {string} str
     *
     * @return {Object}
     */
    object_decode: str => JSON.parse(atob(str)),

    /**
     * @param {Object} err
     * @param {boolean} isError
     * 
     * @return {string}
     */
    getResponseMsg: (response, isError = false) => {
      var e = isError ? response.responseJSON : response,
        toStr = any => typeof any === 'string'
          ? any
          : (typeof response === 'string'
            ? response
            : (response?.responseText
              ? `<div class="text-left">${response.responseText}</div>`
              : JSON.stringify(response))
          )

      return isError
        ? (e?.errors?.[Object.keys(e?.errors)?.[0]]?.[0]
          ?? e?.meta?.message
          ?? e?.message
          ?? toStr(e)
          ?? 'Internal Server Error')
        : (e?.message
          ?? e?.meta?.message
          ?? toStr(e))
    },

    /**
     * Generate value date for <input type="date">
     * @param {string} value 
     * @param {'date' | 'time' | 'both'} type 
     * 
     * @return {string|[string, string]}
     */
    toDateValue: (value, type = 'date') => {
      var date = (new Date(value)).toISOString().split('T')

      switch (type) {
        case 'date':
          return date[0]
        case 'time':
          return date[1]

        default:
          return date
      }
    },

    /**
     * Render select2
     * @param {string} selector
     * @param {Object} options
     * 
     * @return {JQuery}
     */
    select2: (selector, options = {}) => $(selector).select2(options),

    /**
     * Render datepicker
     * @param {string} selector
     * @param {Object} options
     * 
     * @return {JQuery}
     */
    datepicker: (selector, options = {}) => $(selector).datepicker({
      dateFormat: 'dd M yy',
      ...options
    }),

    /**
     * Map array of time [hour, minute, second, millisecond] to string with format hh:mm:ss.ms i.e. 12:13:14.123
     * @param {Array} arrayOfTime
     * @return {String} formatted time with millisecond
     */    
    mapFullTime: (arrayOfTime => {
      let time = [...arrayOfTime]
      let millisecond = time.pop()
      return (time.join(':')).concat(`.${millisecond}`)
    })
  }
