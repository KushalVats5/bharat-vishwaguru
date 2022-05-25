<div class="card card-default business-income-box-{{$index}} margin-bottom-15">
    <div class="card-header">Presumptive Business Income
        @if($index>0)
        <button type="button" class="close remove-business-details" title="remove business details"
            data-index="{{$index}}">
            <i class="fa-solid fa-trash-can"></i>
        </button>
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <label for="business_nature"><small>Nature Of
                        Business<sup>*</sup></small>
                </label>
                <select name="business_nature[]" class="form-control">
                    <option value="">Please Select</option>
                    <optgroup label="Section 44AE">
                        <option value="9999" @if(isset($business_nature)&&($business_nature=='9999' ))
                            selected="selected" @endif>Goods Carriage (Section 44AE)</option>
                    </optgroup>
                    <optgroup label="Section 44ADA">
                        <option value="16001" @if(isset($business_nature)&&($business_nature=='16001' ))
                            selected="selected" @endif>Legal profession</option>
                        <option value="16002" @if(isset($business_nature)&&($business_nature=='16002' ))
                            selected="selected" @endif>Accounting, book-keeping &amp; auditing
                            profession
                        </option>
                        <option value="16003" @if(isset($business_nature)&&($business_nature=='16003' ))
                            selected="selected" @endif>Tax consultancy</option>
                        <option value="16004" @if(isset($business_nature)&&($business_nature=='16004' ))
                            selected="selected" @endif>Architectural profession</option>
                        <option value="16005" @if(isset($business_nature)&&($business_nature=='16005' ))
                            selected="selected" @endif>Engineering &amp; technical consultancy
                        </option>
                        <option value="16007" @if(isset($business_nature)&&($business_nature=='16007' ))
                            selected="selected" @endif>Fashion designing</option>
                        <option value="16008" @if(isset($business_nature)&&($business_nature=='16008' ))
                            selected="selected" @endif>Interior decoration</option>
                        <option value="14001" @if(isset($business_nature)&&($business_nature=='14001' ))
                            selected="selected" @endif>Software development</option>
                        <option value="14002" @if(isset($business_nature)&&($business_nature=='14002' ))
                            selected="selected" @endif>Other software consultancy</option>
                        <option value="14003" @if(isset($business_nature)&&($business_nature=='14003' ))
                            selected="selected" @endif>Data processing</option>
                        <option value="14005" @if(isset($business_nature)&&($business_nature=='14005' ))
                            selected="selected" @endif>Other IT enabled services</option>
                        <option value="18001" @if(isset($business_nature)&&($business_nature=='18001' ))
                            selected="selected" @endif>General hospitals</option>
                        <option value="18004" @if(isset($business_nature)&&($business_nature=='18004' ))
                            selected="selected" @endif>Diagnostic centers</option>
                        <option value="18010" @if(isset($business_nature)&&($business_nature=='18010' ))
                            selected="selected" @endif>Medical clinics</option>
                        <option value="18017" @if(isset($business_nature)&&($business_nature=='18017' ))
                            selected="selected" @endif>Medical education</option>
                    </optgroup>
                    <optgroup label="Section 44AD">
                        <option value="01001" @if(isset($business_nature)&&($business_nature=='01001' ))
                            selected="selected" @endif>Growing &amp; manufacturing of tea</option>
                        <option value="01010" @if(isset($business_nature)&&($business_nature=='01010' ))
                            selected="selected" @endif>Agricultural &amp; animal husbandry services
                        </option>
                        <option value="01013" @if(isset($business_nature)&&($business_nature=='01013' ))
                            selected="selected" @endif>Growing of timber, plantation, operation of
                            tree
                            nurseries &amp; conserving of forest</option>
                        <option value="01014" @if(isset($business_nature)&&($business_nature=='01014' ))
                            selected="selected" @endif>Gathering of tendu leaves</option>
                        <option value="02006" @if(isset($business_nature)&&($business_nature=='02006' ))
                            selected="selected" @endif>Other Fish farming activity n.e.c</option>
                        <option value="03006" @if(isset($business_nature)&&($business_nature=='03006' ))
                            selected="selected" @endif>Mining of uranium &amp; thorium ores</option>
                        <option value="03009" @if(isset($business_nature)&&($business_nature=='03009' ))
                            selected="selected" @endif>Mining of gemstones</option>
                        <option value="03015" @if(isset($business_nature)&&($business_nature=='03015' ))
                            selected="selected" @endif>Mining &amp; production of salt</option>
                        <option value="03016" @if(isset($business_nature)&&($business_nature=='03016' ))
                            selected="selected" @endif>Other mining &amp; quarrying n.e.c</option>
                        <option value="04006" @if(isset($business_nature)&&($business_nature=='04006' ))
                            selected="selected" @endif>Manufacture of sugar</option>
                        <option value="04007" @if(isset($business_nature)&&($business_nature=='04007' ))
                            selected="selected" @endif>Manufacture of cocoa, chocolates &amp; sugar
                            confectionery</option>
                        <option value="04008" @if(isset($business_nature)&&($business_nature=='04008' ))
                            selected="selected" @endif>Flour milling</option>
                        <option value="04009" @if(isset($business_nature)&&($business_nature=='04009' ))
                            selected="selected" @endif>Rice milling</option>
                        <option value="04020" @if(isset($business_nature)&&($business_nature=='04020' ))
                            selected="selected" @endif>Manufacture of mineral water</option>
                        <option value="04021" @if(isset($business_nature)&&($business_nature=='04021' ))
                            selected="selected" @endif>Manufacture of soft drinks</option>
                        <option value="04022" @if(isset($business_nature)&&($business_nature=='04022' ))
                            selected="selected" @endif>Manufacture of other non-alcoholic beverages
                        </option>
                        <option value="04023" @if(isset($business_nature)&&($business_nature=='04023' ))
                            selected="selected" @endif>Manufacture of tobacco products</option>
                        <option value="04031" @if(isset($business_nature)&&($business_nature=='04031' ))
                            selected="selected" @endif>Manufacture of footwear</option>
                        <option value="04033" @if(isset($business_nature)&&($business_nature=='04033' ))
                            selected="selected" @endif>Manufacture of paper &amp; paper products
                        </option>
                        <option value="04082" @if(isset($business_nature)&&($business_nature=='04082' ))
                            selected="selected" @endif>Manufacture of optical instruments</option>
                        <option value="04083" @if(isset($business_nature)&&($business_nature=='04083' ))
                            selected="selected" @endif>Manufacture of watches &amp; clocks</option>
                        <option value="04084" @if(isset($business_nature)&&($business_nature=='04084' ))
                            selected="selected" @endif>Manufacture of motor vehicles</option>
                        <option value="04093" @if(isset($business_nature)&&($business_nature=='04093' ))
                            selected="selected" @endif>Manufacture of jewellery</option>
                        <option value="04094" @if(isset($business_nature)&&($business_nature=='04094' ))
                            selected="selected" @endif>Manufacture of sports goods</option>
                        <option value="04095" @if(isset($business_nature)&&($business_nature=='04095' ))
                            selected="selected" @endif>Manufacture of musical instruments</option>
                        <option value="04096" @if(isset($business_nature)&&($business_nature=='04096' ))
                            selected="selected" @endif>Manufacture of games &amp; toys</option>
                        <option value="04097" @if(isset($business_nature)&&($business_nature=='04097' ))
                            selected="selected" @endif>Other manufacturing n.e.c.</option>
                        <option value="05004" @if(isset($business_nature)&&($business_nature=='05004' ))
                            selected="selected" @endif>Other essential commodity service n.e.c
                        </option>
                        <option value="06008" @if(isset($business_nature)&&($business_nature=='06008' ))
                            selected="selected" @endif>Construction &amp; maintenance of power
                            transmission &amp; telecommunication lines</option>
                        <option value="06010" @if(isset($business_nature)&&($business_nature=='06010' ))
                            selected="selected" @endif>Other construction activity n.e.c.</option>
                        <option value="07005" @if(isset($business_nature)&&($business_nature=='07005' ))
                            selected="selected" @endif>Other real estate/renting services n.e.c
                        </option>
                        <option value="08006" @if(isset($business_nature)&&($business_nature=='08006' ))
                            selected="selected" @endif>Renting of office machinery &amp; equipment
                        </option>
                        <option value="08009" @if(isset($business_nature)&&($business_nature=='08009' ))
                            selected="selected" @endif>Renting of other machinery n.e.c.</option>
                        <option value="09002" @if(isset($business_nature)&&($business_nature=='09002' ))
                            selected="selected" @endif>Repair &amp; maintenance of motor vehicles
                        </option>
                        <option value="09020" @if(isset($business_nature)&&($business_nature=='09020' ))
                            selected="selected" @endif>Wholesale of waste, scrap &amp; materials for
                            re-cycling</option>
                        <option value="09026" @if(isset($business_nature)&&($business_nature=='09026' ))
                            selected="selected" @endif>Retail sale of hardware, paint &amp; glass
                        </option>
                        <option value="09027" @if(isset($business_nature)&&($business_nature=='09027' ))
                            selected="selected" @endif>Wholesale of other products n.e.c</option>
                        <option value="09028" @if(isset($business_nature)&&($business_nature=='09028' ))
                            selected="selected" @endif>Retail sale of other products n.e.c</option>
                        <option value="10001" @if(isset($business_nature)&&($business_nature=='10001' ))
                            selected="selected" @endif>Hotels – Star rated</option>
                        <option value="10002" @if(isset($business_nature)&&($business_nature=='10002' ))
                            selected="selected" @endif>Hotels – Non-star rated</option>
                        <option value="10007" @if(isset($business_nature)&&($business_nature=='10007' ))
                            selected="selected" @endif>Restaurants – with bars</option>
                        <option value="10008" @if(isset($business_nature)&&($business_nature=='10008' ))
                            selected="selected" @endif>Restaurants – without bars</option>
                        <option value="10012" @if(isset($business_nature)&&($business_nature=='10012' ))
                            selected="selected" @endif>Other hospitality services n.e.c.</option>
                        <option value="11001" @if(isset($business_nature)&&($business_nature=='11001' ))
                            selected="selected" @endif>Travel agencies &amp; tour operators</option>
                        <option value="11005" @if(isset($business_nature)&&($business_nature=='11005' ))
                            selected="selected" @endif>Transport by urban/sub-urban railways</option>
                        <option value="11015" @if(isset($business_nature)&&($business_nature=='11015' ))
                            selected="selected" @endif>Other Transport &amp; Logistics services n.e.c
                        </option>
                        <option value="12001" @if(isset($business_nature)&&($business_nature=='12001' ))
                            selected="selected" @endif>Post &amp; courier activities</option>
                        <option value="12002" @if(isset($business_nature)&&($business_nature=='12002' ))
                            selected="selected" @endif>Basic telecom services</option>
                        <option value="12003" @if(isset($business_nature)&&($business_nature=='12003' ))
                            selected="selected" @endif>Value added telecom services</option>
                        <option value="13001" @if(isset($business_nature)&&($business_nature=='13001' ))
                            selected="selected" @endif>Commercial banks, saving banks &amp; discount
                            houses</option>
                        <option value="13009" @if(isset($business_nature)&&($business_nature=='13009' ))
                            selected="selected" @endif>Chit fund</option>
                        <option value="13015" @if(isset($business_nature)&&($business_nature=='13015' ))
                            selected="selected" @endif>Stock brokers, sub-brokers &amp; related
                            activities</option>
                        <option value="13016" @if(isset($business_nature)&&($business_nature=='13016' ))
                            selected="selected" @endif>Financial advisers, mortgage advisers &amp;
                            brokers</option>
                        <option value="14010" @if(isset($business_nature)&&($business_nature=='14010' ))
                            selected="selected" @endif>Other computation related services n.e.c.
                        </option>
                        <option value="17006" @if(isset($business_nature)&&($business_nature=='17006' ))
                            selected="selected" @endif>Coaching centres &amp; tuitions</option>
                        <option value="17007" @if(isset($business_nature)&&($business_nature=='17007' ))
                            selected="selected" @endif>Other education services n.e.c.</option>
                        <option value="19007" @if(isset($business_nature)&&($business_nature=='19007' ))
                            selected="selected" @endif>Political organisations</option>
                        <option value="20002" @if(isset($business_nature)&&($business_nature=='20002' ))
                            selected="selected" @endif>Film distribution</option>
                        <option value="20017" @if(isset($business_nature)&&($business_nature=='20017' ))
                            selected="selected" @endif>Museum activities</option>
                        <option value="20023" @if(isset($business_nature)&&($business_nature=='20023' ))
                            selected="selected" @endif>Other sporting activities n.e.c.</option>
                        <option value="20024" @if(isset($business_nature)&&($business_nature=='20024' ))
                            selected="selected" @endif>Other recreational activities n.e.c.</option>
                        <option value="21001" @if(isset($business_nature)&&($business_nature=='21001' ))
                            selected="selected" @endif>Hair dressing &amp; other beauty treatment
                        </option>
                        <option value="21002" @if(isset($business_nature)&&($business_nature=='21002' ))
                            selected="selected" @endif>Funeral &amp; related activities</option>
                        <option value="21003" @if(isset($business_nature)&&($business_nature=='21003' ))
                            selected="selected" @endif>Marriage bureaus</option>
                        <option value="21007" @if(isset($business_nature)&&($business_nature=='21007' ))
                            selected="selected" @endif>Private households as employers of domestic
                            staff
                        </option>
                        <option value="21008" @if(isset($business_nature)&&($business_nature=='21008' ))
                            selected="selected" @endif>Other services n.e.c.</option>
                        <option value="22001" @if(isset($business_nature)&&($business_nature=='22001' ))
                            selected="selected" @endif>Extra territorial organisations &amp; bodies
                            (IMF,
                            World Bank, European Commission etc.)</option>
                        <option value="21006" @if(isset($business_nature)&&($business_nature=='21006' ))
                            selected="selected" @endif>Astrological &amp; spiritualists activities
                        </option>
                        <option value="16019" @if(isset($business_nature)&&($business_nature=='16019' ))
                            selected="selected" @endif>Other professional services n.e.c.</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-sm-6">

                <label for="name_of_the_business"><small>Name Of The Busines</small></label>
                <input type="text" class="form-control" name="name_of_the_business[]"
                    value="{{ $name_of_the_business??old('name_of_the_business.*')??'' }}">
            </div>
        </div>
        <div class="clear-fix">&nbsp;</div>
        <div class="row">
            <div class="col-sm-6">
                <label for="gross_turnover_receipt"><small>Gross Turnover Or Gross
                        Receipt</small></label>

                <input type="text" class="form-control" name="gross_turnover_receipt[]"
                    value="{{ $gross_turnover_receipt??old('gross_turnover_receipt.*')??'0' }}">
            </div>
            <div class="col-sm-6">
                <label for="total_presumptive_income"><small>Total Presumptive
                        Income</small></label>
                <input type="text" class="form-control" name="total_presumptive_income[]"
                    value="{{ $total_presumptive_income??old('total_presumptive_income.*')??'0' }}">
            </div>
        </div>
    </div>
</div>