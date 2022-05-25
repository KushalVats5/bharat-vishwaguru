@extends('layouts.client-auth')


@section('content')
<div class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="container border margin-5b">
                <section class="step-indicator">
                    <div class="step step1 active">
                        <div class="step-icon">1</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step2 active">
                        <div class="step-icon">2</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step3 active">
                        <div class="step-icon">3</div>
                    </div>
                    <div class="indicator-line active"></div>
                    <div class="step step4">
                        <div class="step-icon">4</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step5">
                        <div class="step-icon">5</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step6">
                        <div class="step-icon">6</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step7">
                        <div class="step-icon">7</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step8">
                        <div class="step-icon">8</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step9">
                        <div class="step-icon">9</div>
                    </div>
                    <div class="indicator-line"></div>
                    <div class="step step10">
                        <div class="step-icon">10</div>
                    </div>
                </section>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="page-title">Employment Details</h5>
                        <div class="heading-elements">
                            <!-- <a class="btn btn-danger btn-sm px-5" href="{{route('articles.index') }}">
                                <i class="fa fa-arrow-left mr-2"></i> {{__('Return Back')}}
                            </a> -->
                        </div>
                    </div>

                    <hr />
                    <form action="{{ route('tr/user/itr-employment/save') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="itr_sources_id" value="{{ $itr_sources_id ?? '' }}">
                        <div class="salary-details-box" id="salary-details-box">
                            @forelse($itr_employment_details as $itr_employment_detail )
                            @include('tr.client.itr.template-parts.salary-details', ['index' => $loop->index,
                            'itr_employment_detail'=>$itr_employment_detail])

                            @empty
                            @include('tr.client.itr.template-parts.salary-details', ['index' =>
                            0,'itr_employment_detail'=>[]])


                            @endforelse
                        </div>



                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-sm-12">
                                @php
                                $data_saved_row = (count($itr_employment_details)>=1)?1:0;
                                @endphp
                                <button type="button" class="btn btn-success float-right" id="add-salary-details"
                                    data-index="0" data-saved-row="{{$data_saved_row}}">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <div id="msg-row" class="color-red"></div>
                            </div>
                        </div>


                        <div class="clear-fix">&nbsp;</div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('tr/user/itr-personal-details', ['id'=>$itr_sources_id]) }}"
                                    class="btn btn-info px-5">Back</a>
                                <button type="submit" class="btn btn-primary  px-5">Save</button>

                                @if(count($itr_employment_details)>0)
                                <a href="{{ route('tr/user/itr-business-income', ['id'=>$itr_sources_id]) }}"
                                    class="btn btn-info  px-5">Next</a>
                                @else
                                <a href="javascript:void(0);" class="btn btn-info px-5 disabled">Next</a>
                                @endif
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
<style>
hr.saperation-line {
    background-size: 4px 4px;
    height: 0px;
    border: 1px #ced4da solid;
    margin: 12px 0 12px;
}
</style>
@section('script')
<script>
$(document).ready(function() {
    function add_other_allowances(elem) {
        let action = 'other_allowances';
        let index = elem.attr('data-index');
        index = parseInt(index) + 1;
        let salary_box_index = elem.attr('data-sb-index');

        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                salary_box_index,
                index
            },
            success: function(response) {
                $(".other-allawance-box-" + salary_box_index).append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-other-allawances").on('click', function() {
                    $(this).parent().parent().remove();
                });
            }
        });
    }
    $(".add-other-allawances-0").on('click', function() {
        add_other_allowances($(this));
    });
    $(".remove-other-allawances").on('click', function() {
        $(this).parent().parent().remove();
    });

    $("#add-salary-details").on('click', function() {
        let elem = $(this);
        let action = 'salary_details';
        let index = elem.attr('data-index');
        let data_saved_row = elem.attr('data-saved-row');
        if (data_saved_row == 0) {
            $("#msg-row").html('');
            $("#msg-row").html(
                'Please save the prevously added salary details first!, Please click on save button below.'
            );
            return 0;
        }
        index = parseInt(index) + 1;
        $.ajax({
            type: 'POST',
            url: user_ajax_url + "/get-template-part",
            data: {
                action,
                index
            },
            success: function(response) {
                $("#salary-details-box").append(response);
                elem.attr('data-index', index);
                /* re-introduce the code to delete row */
                $(".remove-salary-details").on('click', function() {
                    $(this).parent().parent().hide(500);
                    $(this).parent().parent().remove();
                });
                $(".add-other-allawances-" + index).on('click', function() {
                    add_other_allowances($(this));
                });



            }
        });
    });

    $(".remove-salary-details").on('click', function() {
        $(this).parent().parent().hide(500);
        $(this).parent().parent().remove();
    });


});
</script>
@endsection