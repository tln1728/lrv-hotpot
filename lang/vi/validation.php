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

    'accepted'      => '(VN)The :attribute field must be accepted.',
    'accepted_if'   => '(VN)The :attribute field must be accepted when :other is :value.',
    'active_url'    => '(VN)The :attribute field must be a valid URL.',
    'after'         => '(VN)The :attribute field must be a date after :date.',
    'after_or_equal' => '(VN)The :attribute field must be a date after or equal to :date.',
    'alpha'         => '(VN)The :attribute field must only contain letters.',
    'alpha_dash'    => '(VN)The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num'     => '(VN)The :attribute field must only contain letters and numbers.',
    'array'         => '(VN)The :attribute field must be an array.',
    'ascii'         => '(VN)The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before'        => '(VN)The :attribute field must be a date before :date.',
    'before_or_equal' => '(VN)The :attribute field must be a date before or equal to :date.',
    'between' => [
        'array'     => '(VN)The :attribute field must have between :min and :max items.',
        'file'      => '(VN)The :attribute field must be between :min and :max kilobytes.',
        'numeric'   => '(VN)The :attribute field must be between :min and :max.',
        'string'    => '(VN)The :attribute field must be between :min and :max characters.',
    ],
    'boolean'       => '(VN)The :attribute field must be true or false.',
    'can'           => '(VN)The :attribute field contains an unauthorized value.',
    'confirmed'     => 'Trường :attribute không trùng.',
    'current_password' => '(VN)The password is incorrect.',
    'date'          => '(VN)The :attribute field must be a valid date.',
    'date_equals'   => '(VN)The :attribute field must be a date equal to :date.',
    'date_format'   => '(VN)The :attribute field must match the format :format.',
    'decimal'       => '(VN)The :attribute field must have :decimal decimal places.',
    'declined'      => '(VN)The :attribute field must be declined.',
    'declined_if'   => '(VN)The :attribute field must be declined when :other is :value.',
    'different'     => '(VN)The :attribute field and :other must be different.',
    'digits'        => '(VN)The :attribute field must be :digits digits.',
    'digits_between' => '(VN)The :attribute field must be between :min and :max digits.',
    'dimensions'    => '(VN)The :attribute field has invalid image dimensions.',
    'distinct'      => '(VN)The :attribute field has a duplicate value.',
    'doesnt_end_with'   => '(VN)The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => '(VN)The :attribute field must not start with one of the following: :values.',
    'email'         => '(VN)The :attribute field must be a valid email address.',
    'ends_with'     => '(VN)The :attribute field must end with one of the following: :values.',
    'enum'          => '(VN)The selected :attribute is invalid.',
    'exists'        => ':attribute không tồn tại hoặc không hợp lệ.',
    'extensions'    => '(VN)The :attribute field must have one of the following extensions: :values.',
    'file'          => '(VN)The :attribute field must be a file.',
    'filled' => '(VN)The :attribute field must have a value.',
    'gt' => [
        'array'     => '(VN)The :attribute field must have more than :value items.',
        'file'      => '(VN)The :attribute field must be greater than :value kilobytes.',
        'numeric'   => '(VN)The :attribute field must be greater than :value.',
        'string'    => '(VN)The :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => '(VN)The :attribute field must have :value items or more.',
        'file' => '(VN)The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => '(VN)The :attribute field must be greater than or equal to :value.',
        'string' => '(VN)The :attribute field must be greater than or equal to :value characters.',
    ],
    'hex_color' => '(VN)The :attribute field must be a valid hexadecimal color.',
    'image' => 'Trường :attribute chứa ảnh không hợp lệ.',
    'in' => 'Trường :attribute không hợp lệ.',
    'in_array' => '(VN)The :attribute field must exist in :other.',
    'integer' => '(VN)The :attribute field must be an integer.',
    'ip' => '(VN)The :attribute field must be a valid IP address.',
    'ipv4' => '(VN)The :attribute field must be a valid IPv4 address.',
    'ipv6' => '(VN)The :attribute field must be a valid IPv6 address.',
    'json' => '(VN)The :attribute field must be a valid JSON string.',
    'lowercase' => '(VN)The :attribute field must be lowercase.',
    'lt' => [
        'array' => '(VN)The :attribute field must have less than :value items.',
        'file' => '(VN)The :attribute field must be less than :value kilobytes.',
        'numeric' => '(VN)The :attribute field must be less than :value.',
        'string' => '(VN)The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => '(VN)The :attribute field must not have more than :value items.',
        'file' => '(VN)The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => '(VN)The :attribute field must be less than or equal to :value.',
        'string' => '(VN)The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => '(VN)The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => '(VN)The :attribute field must not have more than :max items.',
        'file' => '(VN)The :attribute field must not be greater than :max kilobytes.',
        'numeric' => '(VN)The :attribute field must not be greater than :max.',
        'string' => '(VN)The :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => '(VN)The :attribute field must not have more than :max digits.',
    'mimes' => '(VN)The :attribute field must be a file of type: :values.',
    'mimetypes' => '(VN)The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => '(VN)The :attribute field must have at least :min items.',
        'file' => '(VN)The :attribute field must be at least :min kilobytes.',
        'numeric' => '(VN)The :attribute field must be at least :min.',
        'string' => ':attribute cần dài nhất :min ký tự.',
    ],
    'min_digits' => '(VN)The :attribute field must have at least :min digits.',
    'missing' => '(VN)The :attribute field must be missing.',
    'missing_if' => '(VN)The :attribute field must be missing when :other is :value.',
    'missing_unless' => '(VN)The :attribute field must be missing unless :other is :value.',
    'missing_with' => '(VN)The :attribute field must be missing when :values is present.',
    'missing_with_all' => '(VN)The :attribute field must be missing when :values are present.',
    'multiple_of' => '(VN)The :attribute field must be a multiple of :value.',
    'not_in' => '(VN)The selected :attribute is invalid.',
    'not_regex' => '(VN)The :attribute field format is invalid.',
    'numeric' => '(VN)The :attribute field must be a number.',
    'password' => [
        'letters' => '(VN)The :attribute field must contain at least one letter.',
        'mixed' => '(VN)The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => '(VN)The :attribute field must contain at least one number.',
        'symbols' => '(VN)The :attribute field must contain at least one symbol.',
        'uncompromised' => '(VN)The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => '(VN)The :attribute field must be present.',
    'present_if' => '(VN)The :attribute field must be present when :other is :value.',
    'present_unless' => '(VN)The :attribute field must be present unless :other is :value.',
    'present_with' => '(VN)The :attribute field must be present when :values is present.',
    'present_with_all' => '(VN)The :attribute field must be present when :values are present.',
    'prohibited' => '(VN)The :attribute field is prohibited.',
    'prohibited_if' => '(VN)The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => '(VN)The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => '(VN)The :attribute field prohibits :other from being present.',
    'regex' => '(VN)The :attribute field format is invalid.',
    'required' => 'Trường :attribute là bắt buộc.',
    'required_array_keys' => '(VN)The :attribute field must contain entries for: :values.',
    'required_if' => '(VN)The :attribute là bắt buộc when :other is :value.',
    'required_if_accepted' => '(VN)The :attribute là bắt buộc when :other is accepted.',
    'required_unless' => '(VN)The :attribute là bắt buộc unless :other is in :values.',
    'required_with' => '(VN)The :attribute là bắt buộc when :values is present.',
    'required_with_all' => '(VN)The :attribute là bắt buộc when :values are present.',
    'required_without' => '(VN)The :attribute là bắt buộc when :values is not present.',
    'required_without_all' => '(VN)The :attribute là bắt buộc when none of :values are present.',
    'same' => '(VN)The :attribute field must match :other.',
    'size' => [
        'array' => '(VN)The :attribute field must contain :size items.',
        'file' => '(VN)The :attribute field must be :size kilobytes.',
        'numeric' => '(VN)The :attribute field must be :size.',
        'string' => '(VN)The :attribute field must be :size characters.',
    ],
    'starts_with' => '(VN)The :attribute field must start with one of the following: :values.',
    'string' => '(VN)The :attribute field must be a string.',
    'timezone' => '(VN)The :attribute field must be a valid timezone.',
    'unique' => '(VN)The :attribute has already been taken.',
    'uploaded' => '(VN)The :attribute failed to upload.',
    'uppercase' => '(VN)The :attribute field must be uppercase.',
    'url' => '(VN)The :attribute field must be a valid URL.',
    'ulid' => '(VN)The :attribute field must be a valid ULID.',
    'uuid' => '(VN)The :attribute field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
