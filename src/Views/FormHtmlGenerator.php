<?php

namespace Devinci\QuickForm\Views;

class FormHtmlGenerator
{
    public function render(array $formData)
    {
        // Generate the HTML for the form using the provided data
        $htmlForm = $this->generateForm($formData['formAttributes'], $formData['inputs'], $formData['submitButton'], $formData['clearButton']);

        // Return the HTML form
        return $htmlForm;
    }

    private function generateForm($formAttributes, $inputs, $submitButton, $clearButton)
    {
        $html = '<form ';

        foreach ($formAttributes as $key => $value) {
            $html .= $key . '="' . htmlspecialchars($value) . '" ';
        }

        $html .= '>';

        foreach ($inputs as $input) {
            $html .= '<fieldset>';
            $html .= '<label for="' . $input['name'] . '">' . htmlspecialchars($input['placeholder']) . ':</label>';
            $html .= '<input type="' . $input['type'] . '" name="' . $input['name'] . '" placeholder="' . htmlspecialchars($input['placeholder']) . '"';

            foreach ($input['attributes'] as $key => $value) {
                $html .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
            }

            $html .= '>';
            $html .= '</fieldset>';
        }

        $html .= '<input type="submit" ';

        foreach ($submitButton['attributes'] as $key => $value) {
            $html .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
        }

        $html .= '>';

        if ($clearButton) {
            $html .= '<input type="reset" ';

            foreach ($clearButton['attributes'] as $key => $value) {
                $html .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
            }

            $html .= '>';
        }

        $html .= '</form>';

        return $html;
    }
}
