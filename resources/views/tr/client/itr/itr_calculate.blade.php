@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Calculations</h5>
                    </div>

                    <hr />
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $itr_source->id ?? '' }}">
                        <div class="card card-default">
                            <div class="card-header">ITR Calculations</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <h3>Select your Tax Regime</h3>
                                        <p>Basis your inputs, your recommended regime is <b>New tax regime</b>, but
                                            since filing due date
                                            is over only <b>Old tax regime</b> can be selected now.</p>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div
                                            class="switch switch--horizontal switch--expanding-inner leftSwitch regime_switch">
                                            <input id="old_regime_radio" type="radio" name="regime" value="N"
                                                data-id="form10ie_div" checked="checked" data-balance_tax="107000"
                                                data-dirrty-initial-value="checked">
                                            <label for="old_regime_radio">Old Regime</label>
                                            <input id="new_regime_radio" type="radio" name="regime" value="Y"
                                                data-id="form10ie_div" data-balance_tax="85620"
                                                data-dirrty-initial-value="unchecked">
                                            <label for="new_regime_radio">New Regime</label><span
                                                class="toggle-outside"><span class="toggle-inside"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table computation_tble old_regime">
                                            <thead>
                                                <tr>
                                                    <th><br>Details</th>
                                                    <th>
                                                        <br> Old Regime
                                                    </th>
                                                    <th>
                                                        <br> New Regime
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Income from Salary / Pension </td>
                                                    <td>4,08,000</td>
                                                    <td>5,00,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Income from Presumtive Business </td>
                                                    <td>4,75,800</td>
                                                    <td>4,75,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Income from House Property (self occupied/ let out) </td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Income from Other Sources </td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Gross Total Income </td>
                                                    <td>8,83,800</td>
                                                    <td>9,75,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Deductions </td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>
                                                <tr>
                                                    <td>Taxable Total Income (5-6) </td>
                                                    <td>8,83,800</td>
                                                    <td>9,75,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Net Tax Liability </td>
                                                    <td>92,830</td>
                                                    <td>74,225</td>
                                                </tr>
                                                <tr>
                                                    <td>Interest U/S 234 A/B/C </td>
                                                    <td>14,174</td>
                                                    <td>11,396</td>
                                                </tr>
                                                <tr>
                                                    <td>Late Filing Fees u/s 234F </td>
                                                    <td>5,000</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Tax &amp; Interest Payable </td>
                                                    <td>1,12,004</td>
                                                    <td>90,621</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Taxes Paid </td>
                                                    <td>5,000</td>
                                                    <td>5,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Balance Tax Payable </td>
                                                    <td>1,07,000</td>
                                                    <td>85,620</td>
                                                </tr>
                                                <tr class="detailed_computation_block">
                                                    <td>Download Detailed Computation </td>
                                                    <td><a href="https://tax2win.in/efile-income-tax-return/detailed-computation/old-regime/386230"
                                                            class="old"><svg version="1.1" id="Layer_1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 443.4 547.3"
                                                                enable-background="new 0 0 443.4 547.3"
                                                                xml:space="preserve">
                                                                <g>
                                                                    <path fill="none" stroke="#010101"
                                                                        stroke-width="23.9811" stroke-miterlimit="10" d="M19.1,80.6v385.3c0,22.9,17.5,46.4,37.6,56.3
                                                    c6.4,3.1,16.3,6.6,25.3,6.6h277.5c35.5,0,64.9-31.8,64.9-67.9V162.4c0-8.2-13.9-18.7-22.3-28.7l-17.4-17.5c-2-2.2-2.1-2.9-4-5
                                                    l-13-13c-3.5-3.5-5.2-6.2-8.5-9.5c-11.8-12-22.6-23.4-34.5-35.4l-17-18c-1.5-1.5-2.6-2.4-4-4c-2.1-2.3-9.5-12.8-14.2-12.8H76
                                                    C51.5,18.6,19.1,49.5,19.1,80.6L19.1,80.6z"></path>
                                                                    <path class="fillcolor" fill-rule="evenodd"
                                                                        clip-rule="evenodd" fill="#000" d="M208.7,333.1l-49.6-52.2c-10.1-10.4-22.3-2.1-22.3,7.3
                                                    c0,7.6,3.7,8.7,7.4,13.6l69,73.7c13.9,10.4,21-5.7,31.6-16.2c4.2-4.2,6.9-6.7,10.6-11.4c3.2-4,7.3-7.2,10.9-11.1
                                                    c2.3-2.4,2.6-3.5,5-6l32-33.9c11.3-13.8-9.4-28.9-19.9-15.9c-9.6,11.9-35.7,37.2-41.9,44.9c-2.4,3-3.7,6.1-7.8,7.1V216.3
                                                    c0-4.5,0.5-16.1-0.2-19.8c-1.9-9.2-17.5-13.9-23.4-1.8c-2.8,5.8-1.4,50.2-1.4,58.5C208.7,279.8,208.7,306.4,208.7,333.1
                                                    L208.7,333.1z"></path>
                                                                    <path class="fillcolor" fill-rule="evenodd"
                                                                        clip-rule="evenodd" fill="#010101" d="M120.9,443.8h202.6c15.8,0,15.7-24.9,1-24.9H118.9
                                                    C104.1,418.9,102.5,443.8,120.9,443.8L120.9,443.8z"></path>
                                                                </g>
                                                            </svg> <span>Computation</span> <small> Old Regime
                                                            </small></a></td>
                                                    <td><a href="https://tax2win.in/efile-income-tax-return/detailed-computation/new-regime/386230"
                                                            class="new"><svg version="1.1" id="Layer_1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 443.4 547.3"
                                                                enable-background="new 0 0 443.4 547.3"
                                                                xml:space="preserve">
                                                                <g>
                                                                    <path fill="none" stroke="#010101"
                                                                        stroke-width="23.9811" stroke-miterlimit="10" d="M19.1,80.6v385.3c0,22.9,17.5,46.4,37.6,56.3
                                                    c6.4,3.1,16.3,6.6,25.3,6.6h277.5c35.5,0,64.9-31.8,64.9-67.9V162.4c0-8.2-13.9-18.7-22.3-28.7l-17.4-17.5c-2-2.2-2.1-2.9-4-5
                                                    l-13-13c-3.5-3.5-5.2-6.2-8.5-9.5c-11.8-12-22.6-23.4-34.5-35.4l-17-18c-1.5-1.5-2.6-2.4-4-4c-2.1-2.3-9.5-12.8-14.2-12.8H76
                                                    C51.5,18.6,19.1,49.5,19.1,80.6L19.1,80.6z"></path>
                                                                    <path class="fillcolor" fill-rule="evenodd"
                                                                        clip-rule="evenodd" fill="#000" d="M208.7,333.1l-49.6-52.2c-10.1-10.4-22.3-2.1-22.3,7.3
                                                    c0,7.6,3.7,8.7,7.4,13.6l69,73.7c13.9,10.4,21-5.7,31.6-16.2c4.2-4.2,6.9-6.7,10.6-11.4c3.2-4,7.3-7.2,10.9-11.1
                                                    c2.3-2.4,2.6-3.5,5-6l32-33.9c11.3-13.8-9.4-28.9-19.9-15.9c-9.6,11.9-35.7,37.2-41.9,44.9c-2.4,3-3.7,6.1-7.8,7.1V216.3
                                                    c0-4.5,0.5-16.1-0.2-19.8c-1.9-9.2-17.5-13.9-23.4-1.8c-2.8,5.8-1.4,50.2-1.4,58.5C208.7,279.8,208.7,306.4,208.7,333.1
                                                    L208.7,333.1z"></path>
                                                                    <path class="fillcolor" fill-rule="evenodd"
                                                                        clip-rule="evenodd" fill="#010101" d="M120.9,443.8h202.6c15.8,0,15.7-24.9,1-24.9H118.9
                                                    C104.1,418.9,102.5,443.8,120.9,443.8L120.9,443.8z"></path>
                                                                </g>
                                                            </svg> <span> Computation</span> <small> New Regime
                                                            </small></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="clear-fix">&nbsp;</div>











                            </div>
                        </div>

                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-itr-details') }}" class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Next</button>
                                <a href="{{ route('tr/user/itr-itr-calculate') }}"
                                    class="btn btn-primary  px-5">Next...</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->

</div>
@endsection
@section('script')
<script>
$(document).ready(function() {


})
</script>
@endsection