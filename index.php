<?php
require_once "vendor/autoload.php";

use Devinci\QuickForm\Core\FormBuilder;
use Devinci\QuickForm\Views\FormHtmlGenerator;

// Create a FormBuilder instance
$formBuilder = new FormBuilder('/submit-form.php', 'POST');

// Add form inputs
$formBuilder->addTextInput('username', 'Username')
            ->addIntegerInput('age', 'Age')
            ->addTextArea('description', 'Description')
            ->addDateInput('dob', 'Date of Birth');
// Set submit-formit button
$formBuilder->setSubmitButton('submitBtn', 'Submit', ['class' => 'submit-button']);

// Get form data
$formData = [
    'formAttributes' => $formBuilder->getFormAttributes(),
    'inputs' => $formBuilder->getInputs(),
    'submitButton' => $formBuilder->getSubmitButton(),
    'clearButton' => $formBuilder->getClearButton(),
];


// Output the HTML form
echo $formBuilder->render();
