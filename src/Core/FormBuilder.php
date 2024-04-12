<?php

namespace Devinci\QuickForm\Core;

use Devinci\QuickForm\Views\FormHtmlGenerator;

class FormBuilder
{
    private $formAttributes = [];
    private $inputs = [];
    private $inputGroups = [];
    private $submitButton;
    private $clearButton;
    private $action;
    private $viewRenderer;

    public function __construct($action = '', $method = 'POST', FormHtmlGenerator $viewRenderer = null)
    {
        $this->action = $action;
        $this->formAttributes['method'] = $method;
        $this->viewRenderer = $viewRenderer ?: new FormHtmlGenerator();
    }

    public function setFormAttributes(array $attributes)
    {
        $this->formAttributes = array_merge($this->formAttributes, $attributes);
        return $this;
    }

    public function addTextInput($name, $placeholder = '', $attributes = [], $group = null)
    {
        // Add text input to the inputs array or group
        $this->addElement('inputs', $name, 'text', $placeholder, $attributes, $group);
        return $this;
    }

    public function addIntegerInput($name, $placeholder = '', $attributes = [], $group = null)
    {
        // Add integer input to the inputs array or group
        $this->addElement('inputs', $name, 'number', $placeholder, $attributes, $group);
        return $this;
    }

    public function addTextArea($name, $placeholder = '', $attributes = [], $group = null)
    {
        // Add text-area input to the inputs array or group
        $this->addElement('inputs', $name, 'textarea', $placeholder, $attributes, $group);
        return $this;
    }

    public function addDateInput($name, $placeholder = '', $attributes = [], $group = null)
    {
        // Add date input to the inputs array or group
        $this->addElement('inputs', $name, 'date', $placeholder, $attributes, $group);
        return $this;
    }

    public function addInput($name, $type, $placeholder = '', $attributes = [], $group = null)
    {
        // Add input to the inputs array or group
        $this->addElement('inputs', $name, $type, $placeholder, $attributes, $group);
        return $this;
    }

    public function addRadioInput($name, $value, $label = '', $checked = false, $attributes = [], $group = null)
    {
        // Add radio input to the inputs array or group
        $this->addElement('inputs', $name, 'radio', $label, $attributes + ['value' => $value, 'checked' => $checked], $group);
        return $this;
    }

    public function addCheckboxInput($name, $value, $label = '', $checked = false, $attributes = [], $group = null)
    {
        // Add checkbox input to the inputs array or group
        $this->addElement('inputs', $name, 'checkbox', $label, $attributes + ['value' => $value, 'checked' => $checked], $group);
        return $this;
    }

    public function setInputGroup($group, array $inputs)
    {
        // Set input group
        $this->inputGroups[$group] = $inputs;
        return $this;
    }

    public function setSubmitButton($name = 'submit', $value = 'Submit', $attributes = [])
    {
        // Set submit button
        $this->submitButton = ['name' => $name, 'value' => $value, 'attributes' => $attributes];
        return $this;
    }

    public function setClearButton($name, $value, $attributes = [])
    {
        // Set clear button
        $this->clearButton = ['name' => $name, 'value' => $value, 'attributes' => $attributes];
        return $this;
    }

    public function setAction($action)
    {
        // Set form action
        $this->action = $action;
        return $this;
    }

    public function render()
    {
        // Render the form using the view renderer
        $viewData = [
            'formAttributes' => $this->formAttributes,
            'inputs' => $this->inputs,
            'inputGroups' => $this->inputGroups,
            'submitButton' => $this->submitButton,
            'clearButton' => $this->clearButton,
            'action' => $this->action,
        ];

        return $this->viewRenderer->render($viewData);
    }

    private function addElement($element, $name, $type, $placeholder = '', $attributes = [], $group = null)
    {
        // Add element to the specified array property or group
        $this->{$element}[] = compact('name', 'type', 'placeholder', 'attributes', 'group');
    }

    public function getFormAttributes()
    {
        return $this->formAttributes;
    }

    public function getInputs()
    {
        return $this->inputs;
    }

    public function getSubmitButton()
    {
        return $this->submitButton;
    }

    public function getClearButton()
    {
        return $this->clearButton;
    }

}
