function Validator(options) {
  var formElement = document.querySelector(options.form);

  if (formElement) {
    options.rules.forEach(function (rule) {
      //   console.log(rule.selector);
      var inputElement = formElement.querySelector(rule.selector);
      if (inputElement) {
        inputElement.onblur = function () {
          var errorElement =
            inputElement.parentElement.querySelector(".form-message");
          //   console.log(errorElement);
          var errorMessage = rule.test(inputElement.value);
          //   console.log(errorMessage);

          if (errorMessage) {
            console.log(errorElement);
          }
        };
      }
    });
  }
}

//rules
Validator.isRequired = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : "Vui lòng nhập trường này";
    },
  };
};
Validator.isPassword = function (selector) {
  return {
    selector: selector,
    test: function () {},
  };
};
