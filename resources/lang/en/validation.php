<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :category must be accepted.',
    'active_url'           => 'The :category is not a valid URL.',
    'after'                => 'The :category must be a date after :date.',
    'after_or_equal'       => 'The :category must be a date after or equal to :date.',
    'alpha'                => 'The :category may only contain letters.',
    'alpha_dash'           => 'The :category may only contain letters, numbers, dashes and underscores.',
    'alpha_num'            => 'The :category may only contain letters and numbers.',
    'array'                => 'The :category must be an array.',
    'before'               => 'The :category must be a date before :date.',
    'before_or_equal'      => 'The :category must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :category must be between :min and :max.',
        'file'    => 'The :category must be between :min and :max kilobytes.',
        'string'  => 'The :category must be between :min and :max characters.',
        'array'   => 'The :category must have between :min and :max items.',
    ],
    'boolean'              => 'The :category field must be true or false.',
    'confirmed'            => 'The :category confirmation does not match.',
    'date'                 => 'The :category is not a valid date.',
    'date_format'          => 'The :category does not match the format :format.',
    'different'            => 'The :category and :other must be different.',
    'digits'               => 'The :category must be :digits digits.',
    'digits_between'       => 'The :category must be between :min and :max digits.',
    'dimensions'           => 'The :category has invalid image dimensions.',
    'distinct'             => 'The :category field has a duplicate value.',
    'email'                => 'The :category must be a valid email address.',
    'exists'               => 'The selected :category is invalid.',
    'file'                 => 'The :category must be a file.',
    'filled'               => 'The :category field must have a value.',
    'gt'                   => [
        'numeric' => 'The :category must be greater than :value.',
        'file'    => 'The :category must be greater than :value kilobytes.',
        'string'  => 'The :category must be greater than :value characters.',
        'array'   => 'The :category must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The :category must be greater than or equal :value.',
        'file'    => 'The :category must be greater than or equal :value kilobytes.',
        'string'  => 'The :category must be greater than or equal :value characters.',
        'array'   => 'The :category must have :value items or more.',
    ],
    'image'                => 'The :category must be an image.',
    'in'                   => 'The selected :category is invalid.',
    'in_array'             => 'The :category field does not exist in :other.',
    'integer'              => 'The :category must be an integer.',
    'ip'                   => 'The :category must be a valid IP address.',
    'ipv4'                 => 'The :category must be a valid IPv4 address.',
    'ipv6'                 => 'The :category must be a valid IPv6 address.',
    'json'                 => 'The :category must be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'The :category must be less than :value.',
        'file'    => 'The :category must be less than :value kilobytes.',
        'string'  => 'The :category must be less than :value characters.',
        'array'   => 'The :category must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The :category must be less than or equal :value.',
        'file'    => 'The :category must be less than or equal :value kilobytes.',
        'string'  => 'The :category must be less than or equal :value characters.',
        'array'   => 'The :category must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The :category may not be greater than :max.',
        'file'    => 'The :category may not be greater than :max kilobytes.',
        'string'  => 'The :category may not be greater than :max characters.',
        'array'   => 'The :category may not have more than :max items.',
    ],
    'mimes'                => 'The :category must be a file of type: :values.',
    'mimetypes'            => 'The :category must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :category must be at least :min.',
        'file'    => 'The :category must be at least :min kilobytes.',
        'string'  => 'The :category must be at least :min characters.',
        'array'   => 'The :category must have at least :min items.',
    ],
    'not_in'               => 'The selected :category is invalid.',
    'not_regex'            => 'The :category format is invalid.',
    'numeric'              => 'The :category must be a number.',
    'present'              => 'The :category field must be present.',
    'regex'                => 'The :category format is invalid.',
    'required'             => 'The :category field is required.',
    'required_if'          => 'The :category field is required when :other is :value.',
    'required_unless'      => 'The :category field is required unless :other is in :values.',
    'required_with'        => 'The :category field is required when :values is present.',
    'required_with_all'    => 'The :category field is required when :values is present.',
    'required_without'     => 'The :category field is required when :values is not present.',
    'required_without_all' => 'The :category field is required when none of :values are present.',
    'same'                 => 'The :category and :other must match.',
    'size'                 => [
        'numeric' => 'The :category must be :size.',
        'file'    => 'The :category must be :size kilobytes.',
        'string'  => 'The :category must be :size characters.',
        'array'   => 'The :category must contain :size items.',
    ],
    'string'               => 'The :category must be a string.',
    'timezone'             => 'The :category must be a valid zone.',
    'unique'               => 'The :category has already been taken.',
    'uploaded'             => 'The :category failed to upload.',
    'url'                  => 'The :category format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "category.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given category rule.
    |
    */

    'custom' => [
        'category-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap category place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
