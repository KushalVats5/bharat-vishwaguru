<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css" rel="stylesheet" media="all">
    /* Media Queries */
    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
    </style>
</head>
<?php
$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>
<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;';?>

<body style="{{ $style['body'] }}">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->

                    <tr>
                        <td style="{{ $style['email-masthead'] }}"><a
                                style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}"
                                target="_blank"> <img src="https://taxring.com/storage/default/taxring.jpg"
                                    alt="Taxring" title="Taxring" height="150px" />
                            </a><br /><br />
                            <div align="center">
                                <h3><strong>Welcome:</strong> {{(!empty($data['name'])) ? $data['name'] : 'User'}}</h3>
                            </div>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td style="{{ $style['email-body'] }}">
                            <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                                cellspacing="0">

                                <tr>
                                    <th colspan="2" class="border-0">
                                        <h3>{{ 'Your registration details are below:'}}</h3>
                                    </th>
                                </tr>
                                @if (!empty($data['name']))
                                <tr>
                                    <td align="center"><strong style="float: left; width: 20%; text-align: left;">Name:
                                        </strong><span
                                            style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $data['name'] }}</span>
                                    </td>
                                </tr>
                                @endif
                                @if (!empty($data['email']))
                                <tr>
                                    <td align="center"><strong style="float: left; width: 20%; text-align: left;">Email:
                                        </strong><span
                                            style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $data['email'] }}</span>
                                    </td>
                                </tr>
                                @endif
                                @if (!empty($data['mobile']))
                                <tr>
                                    <td align="center"><strong
                                            style="float: left; width: 20%; text-align: left;">Mobile: </strong><span
                                            style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $data['mobile'] }}</span>
                                    </td>
                                </tr>
                                @endif
                                @if (!empty($data['role']))
                                <tr>
                                    <td align="center"><strong style="float: left; width: 20%; text-align: left;">Role:
                                        </strong><span
                                            style="float: left; margin-left: 15%; width: 60%; text-align: left;">{{ $data['role'] }}</span>
                                    </td>
                                </tr>
                                @endif

                                <tr></tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td>
                            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0"
                                cellspacing="0">
                                <tr>
                                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                        <p style="{{ $style['paragraph-sub'] }}"> &copy; {{ date('Y') }} <a
                                                style="{{ $style['anchor'] }}" href="{{ url('/') }}"
                                                target="_blank">{{ __('Taxring') }}</a>.
                                            All rights reserved. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>