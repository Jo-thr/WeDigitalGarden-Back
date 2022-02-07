<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;

class ContactForm extends Template
{
    public static $type = 'region';
    public static $name = 'Contact';

    public function fields(Request $request): array
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Images::make('Photo', 'illustration')
                ->enableExistingMedia('illustration')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),

            new Panel('Inputs', $this->inputs())
        ];

    }

    protected function inputs()
    {
        return [
            Text::make('Placeholder of last name input', 'label_input_1')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of last name input', 'error_input_1')
                ->sortable()
                 ->rules('required', 'max:255'),
            Text::make('Placeholder of first name input', 'label_input_2')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of first name input', 'error_input_2')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Placeholder of company input', 'label_input_3')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of company input', 'error_input_3')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Placeholder of email input', 'label_input_4')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of email input', 'error_input_4')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Placeholder of phone number input', 'label_input_5')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of phone number input', 'error_input_5')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Placeholder of message input', 'label_input_6')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Error message of message input', 'error_input_6')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Label of button', 'label_button')
                ->sortable()
                ->rules('required', 'max:255'),
            Text::make('Message of success', 'success_message')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }
}
