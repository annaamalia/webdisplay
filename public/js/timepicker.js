((w, $) => {
  class TimePicker {
    /**
     * @param {[string, string, string]} params
     * 
     * @return {Promise}
     */
    constructor(...params) {
      this.timeText = [
        params[0] ?? 'Hours',
        params[1] ?? 'Minutes',
        params[2] ?? 'Seconds',
        params[3] ?? 'Milliseconds'
      ]
      this.arrTime = [[24, this.timeText[0]], [60, this.timeText[1]]]
      this.q = null

      return this.render()
    }

    /**
     * @param {string} query
     * 
     * @return {JQuery}
     */
    init(query) {
      this.q = $(query)

      return this.q
    }

    /**
     * @param {JQuery?} query
     *
     * @return {boolean}
     */
    secondsIsEnabled(query = null) {
      var q = query ?? this.q?.attr?.('seconds-enabled'),
        bool = q ? q === 'true' || q === true || q === '1' || q === 0 : false

      if (bool && !(this.arrTime?.[2])) {
        this.arrTime.push([60, this.timeText[2]])
      }

      return bool
    }

    /**
     * @param {JQuery?} query
     *
     * @return {boolean}
     */
     milliSecondsIsEnabled(query = null) {
      var q = query ?? this.q?.attr?.('milliseconds-enabled'),
        bool = q ? q === 'true' || q === true || q === '1' || q === 0 : false

      if (bool && !(this.arrTime?.[3])) {
        this.arrTime.push([1000, this.timeText[3]])
      }

      return bool
    }

    /**
     * @return {string}
     */
    getOrSetValue() {
      return this.q.attr('value') ?? 'hh:mm' + (this.secondsIsEnabled() ? ':ss' : '') + (this.milliSecondsIsEnabled() ? ':ms' : '')
    }

    /**
     * @param {number} type
     * @return {string}
     */
    setLimit(type) {
      return this.q.attr('max-' + (type === 0
        ? 'hours'
        : type === 1
          ? 'minutes'
          : type === 2
            ? 'seconds'
            : 'milliseconds')
      )
    }

    /**
     * @param {number} key
     *
     * @return {string}
     */
    setInputProps(key) {
      return [
        'data-toggle="dropdown"',
        'data-timer="true"',
        'class="form-control dropdown-toggle"',
        `data-tp="tp-${key}-input"`,
        this.q.attr('disabled') ? 'disabled' : '',
        this.q.attr('readonly') ? 'readonly' : '',
        `value="${this.getOrSetValue()}"`,
      ].join(' ')
    }

    /**
     * @param {number} key
     * @param {number} keyChild
     *
     * @return {string}
     */
    setSelectProps(key, keyChild) {
      return [
        `id="tp-${key}-${keyChild}"`,
        'class="form-control custom-data-timer"',
        `data-type="${keyChild}"`,
        this.secondsIsEnabled() ? 'seconds-enabled="true"' : '',
        this.milliSecondsIsEnabled() ? 'milliseconds-enabled="true"' : '',
      ].join(' ')
    }

    /**
     * @return {void}
     */
    renderLayout() {
      setTimeout(() => {
        $('input[type=time]')
          .addClass('sr-only')
          .attr('type', 'text')
          .each((key, i) => {
            var t = this.init(i),
              value = this.getOrSetValue(),
              val = value.split(':'),
              arrTime = this.arrTime

            t.attr('data-tp', 'tp-' + key)
              .parent()
              .append(`<div id="tp-${key}" class="dropdown" ${this.secondsIsEnabled()
                ? 'seconds-enabled="true"'
                : ''}`
                + `${this.milliSecondsIsEnabled()
                  ? ' milliseconds-enabled="true"'
                  : ''}>`
                + `<input ${this.setInputProps(key)}>`
                + `<div class="dropdown-menu" data-timer="true">`
                + `<form name="plugin-timepicker" novalidate>`
                + `<div class="row p-2">`
                + arrTime.map((i, kk) => `<div class="col-12">`
                  + `<label>${i[1]}</label>`
                  + `<select ${this.setSelectProps(key, kk)}>`
                  + [...Array(i[0])].map((j, k) => {
                    var limit = this.setLimit(kk)

                    if (limit && Number(limit) < k) return ''

                    return (k == 0
                      ? `<option value="">${i[1]}</option>`
                      : ''
                    ) + `<option ${k == val?.[kk]
                      ? 'selected'
                      : ''} value="${addLeadingZero(k, kk == 3 ? 3 : 2)}">${addLeadingZero(k, kk == 3 ? 3 : 2)}</option>`
                  }).join('')
                  + `</select>`
                  + `</div>`).join('')
                + `</div>`
                + `</form>`
                + `</div>`
                + `</div>`)
          })
      }, 1.69)
    }

    /**
     * @return {void}
     */
    fetchFunctional() {
      setTimeout(() => {
        var regexTime = this.secondsIsEnabled()
          ? /^(2[0-3]|[0-1][0-9]):[0-5][0-9]:[0-5][0-9]$/
          : this.milliSecondsIsEnabled()
          ? /^(2[0-3]|[0-1][0-9]):[0-5][0-9]:[0-5][0-9].[0-9]{3,3}$/
          : /^(2[0-3]|[0-1][0-9]):[0-5][0-9]$/,
          validateTime = (time, max) => (Number(time) && time > max && time > 0) ? max : time

        const currentDate = moment().format('Y-MM-DD')

        $('input[data-timer=true]').on('input', e => {
          var _this = $(e.target).parent().parent().find('input')

          if (e.target.value.replace(regexTime)) {
            _this.val(e.target.value)
            _this.trigger('change')
          } else {
            $(e.target).trigger('invalid')
          }
        })

        $('input[data-timer=true]').on('keypress', e => {
          if (new RegExp("^[a-zA-Z.,/ $@()]+$").test(e.key)
            || /[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\"<>\?]/g.test(e.key)
          ) {
            e.preventDefault()
            return false
          }

          if (e.keyCode != 38 && e.keyCode != 40 && e.which != 38 && e.which != 40)
            $(e.target).dropdown('hide')
        })

        $('.custom-data-timer').select2()

        $('form[name="plugin-timepicker"]').on('invalid', () => {
          return true
        })

        $('.custom-data-timer').on('change', e => {
          if (!e.target.value) return;

          var t = $(e.target),
            parent = t.parent().parent().parent().parent().parent(),
            parentInput = parent.find('input'),
            parentVall = parentInput.val().split(':'),
            parentVal = [],
            validate = (idx, v = parentVall) => v?.[idx] && v[idx] !== '' && Number(v[idx])

          const fullTime = moment(`${currentDate} ${parentInput.val()}`)
          const fullTimeArray = fullTime.toArray()
          let dateArray = [...fullTimeArray].splice(0, 3)
          let formatTime = 'HH:mm'

          parentVall = [fullTime.format('HH'), fullTime.format('mm')]
            
          if (this.secondsIsEnabled(t.attr('seconds-enabled'))) {
            parentVall.push(fullTime.format('ss'))
            formatTime = formatTime.concat(':ss')
          }

          if (this.milliSecondsIsEnabled(t.attr('milliseconds-enabled'))) {
            parentVall.push(fullTime.format('SSS'))
            formatTime = formatTime.concat('.SSS')
          }

          parentVal = [
            validate(0) ? (parentVall[0] === 'hh' ? '00' : validateTime(parentVall[0], 23)) : '00',
            validate(1) ? (parentVall[1] === 'mm' ? '00' : validateTime(parentVall[1], 59)) : '00'
          ]

          if (this.secondsIsEnabled(t.attr('seconds-enabled'))) {
            parentVal.push(validate(1) ? (parentVall[2] === 'ss' ? '00' : validateTime(parentVall[2], 59)) : '00')
          }

          if (this.milliSecondsIsEnabled(t.attr('milliseconds-enabled'))) {
            parentVal.push(validate(3) ? (parentVall[3] === 'ms' ? '000' : validateTime(parentVall[3], 999)) : '000')
          }

          parentVal[t.data('type')] = t.val()
          const result = moment([...dateArray, ...parentVal]).format(formatTime)
          parentInput.val(result)
          parent.parent().find('input').val(result).trigger('change')
        })

        var realParent = $('input[data-timer=true]').parent().parent()

        realParent.find('input').on('change', e => {
          var parent = $(e.target).parent().find('.dropdown'),
            valuee = e.target.value.split(':'),
            value = [],
            validate = (idx, v = valuee) => v?.[idx] && v[idx] !== '' && Number(v[idx])

          const fullTime = moment(`${currentDate} ${e.target.value}`)
          const fullTimeArray = fullTime.toArray()
          let dateArray = [...fullTimeArray].splice(0, 3)
          let formatTime = 'HH:mm'

          valuee = [fullTime.format('HH'), fullTime.format('mm')]
            
          if (this.secondsIsEnabled()) {
            valuee.push(fullTime.format('ss'))
            formatTime = formatTime.concat(':ss')
          }

          if (this.milliSecondsIsEnabled()) {
            valuee.push(fullTime.format('SSS'))
            formatTime = formatTime.concat('.SSS')
          }

          value = [
            validate(0) ? (valuee[0] === 'hh' ? '00' : validateTime(valuee[0], 23)) : '00',
            validate(1) ? (valuee[1] === 'mm' ? '00' : validateTime(valuee[1], 59)) : '00'
          ]

          if (this.secondsIsEnabled(parent.attr('seconds-enabled')))
            value.push(validate(2) ? (valuee[2] === 'ss' ? '00' : validateTime(valuee[2], 59)) : '00')

          if (this.milliSecondsIsEnabled(parent.attr('milliseconds-enabled'))) 
            value.push(validate(3) ? (valuee[3] === 'ms' ? '000' : validateTime(valuee[3], 999)) : '000')

          const result = moment([...dateArray, ...value]).format(formatTime)
          $(e.target).val(result)
          parent.find('input').val(result)
          parent.find('select').each((...i) => {
            $(i[1]).val(value[i[0]]).trigger('change.select2')
          })
        })

        $('.modal').each((...i) => {
          var a = $(i[1])

          if (a.find('input[data-timer=true]').length > 0) {
            a.on('shown.bs.modal', () => {
              $('head').append(`<style scope="modal-select2">`
                + `.select2-container--open{`
                + `z-index: ${$('.modal-backdrop.show').css('z-index') + 1} !important;`
                + `}`
                + `</style>`)
            })
            a.on('hidden.bs.modal', () => {
              $('head style[scope=modal-select2]').remove()
            })
          }
        })
      }, 5)
    }

    /**
     * @return {Promise}
     */
    async render() {
      return new Promise(d => d($(async () => {
        await new Promise(dispatch => dispatch(this.renderLayout()))

        this.fetchFunctional()
      })))
    }
  }

  w.TimePicker = TimePicker
})(window, jQuery)
