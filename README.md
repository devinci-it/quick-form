
# devinci-it/quick-form Library

The `Devinci\QuickForm` library provides a convenient way to generate HTML forms dynamically in PHP applications. With this library, developers can easily create and customize forms with various input types, set form attributes, and handle form rendering seamlessly.

## Features

- **FormBuilder Class**: The core component of the library, allowing for the programmatic creation of HTML forms.
- **Support for Multiple Input Types**: Text inputs, integer inputs, text areas, date inputs, radio buttons, and checkboxes are all supported.
- **Form Attribute Management**: Easily set form attributes such as method, action, class, and id.
- **Input Grouping**: Group input fields together for better organization and presentation within the form.
- **Submit and Clear Buttons**: Set submit and clear buttons with customizable attributes.
- **Customization**: Flexibility to customize form elements, attributes, and buttons according to requirements.

## Installation

You can install the `Devinci\QuickForm` library via Composer:

```bash
composer require devinci-it/quick-form
```

Alternatively, you can include the necessary files manually in your project.

## Usage

1. **Instantiate FormBuilder**: Create an instance of the `FormBuilder` class by providing the form action and, optionally, the form submission method and a custom HTML renderer.

    ```php
    $formBuilder = new FormBuilder('/submit-form', 'POST');
    ```

2. **Set Form Attributes**: Optionally, set attributes for the form tag using the `setFormAttributes` method.

    ```php
    $formBuilder->setFormAttributes([
        'class' => 'my-form',
        'id' => 'my-form-id'
    ]);
    ```

3. **Add Input Fields**: Add input fields to the form using methods like `addTextInput`, `addIntegerInput`, `addTextArea`, etc.

    ```php
    $formBuilder->addTextInput('username', 'Enter your username', ['class' => 'form-control']);
    $formBuilder->addIntegerInput('age', 'Enter your age');
    ```

4. **Group Inputs**: Group input fields together using the `setInputGroup` method if needed.

    ```php
    $formBuilder->setInputGroup('personal_info', ['username', 'age']);
    ```

5. **Set Submit and Clear Buttons**: Set the submit button and clear button using the `setSubmitButton` and `setClearButton` methods respectively.

    ```php
    $formBuilder->setSubmitButton('submit', 'Submit Form', ['class' => 'btn btn-primary']);
    $formBuilder->setClearButton('clear', 'Clear Form', ['class' => 'btn btn-secondary']);
    ```

6. **Render the Form**: Render the form HTML using the `render` method.

    ```php
    echo $formBuilder->render();
    ```

7. **Integration with Web Applications**: Integrate the generated forms seamlessly into your web applications by embedding them within HTML pages or templates.

8. **Customization**: Customize the appearance and behavior of forms by modifying CSS styles, JavaScript interactions, and form processing logic as per your application's requirements.

## Examples

The Devinci QuickForm library can be used for various use cases including:

- User Registration Forms
- Data Entry Forms
- Contact Forms
- Survey Forms

## Contribution

Contributions to the Devinci QuickForm library are welcome! Feel free to submit bug reports, feature requests, or pull requests via GitHub.

## License

This library is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---
