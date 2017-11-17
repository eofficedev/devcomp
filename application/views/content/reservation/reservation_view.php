<style>
    .custom-combobox {
        position: relative;
        display: inline-block;
    }
    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
        /* support: IE7 */
        *height: 1.7em;
        *top: 0.1em;
    }
    .custom-combobox-input {
        margin: 0;
        padding: 0.3em;
    }

    .ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all {
        list-style-type: none;
    }

    ul.ui-autocomplete {
        list-style: none;
    }
</style>
<style>
    /* Autocomplete
    ----------------------------------*/
    .ui-autocomplete { position: absolute; cursor: default; }   
    .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

    /* workarounds */
    * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

    /* Menu
    ----------------------------------*/
    .ui-menu {
        list-style:none;
        padding: 2px;
        margin: 0;
        display:block;
    }
    .ui-menu .ui-menu {
        margin-top: -3px;
    }
    .ui-menu .ui-menu-item {
        margin:0;
        padding: 0;
        zoom: 1;
        float: left;
        clear: left;
        width: 100%;
        font-size:80%;
    }
    .ui-menu .ui-menu-item a {
        text-decoration:none;
        display:block;
        padding:.2em .4em;
        line-height:1.5;
        zoom:1;
    }
    .ui-menu .ui-menu-item a.ui-state-hover,
    .ui-menu .ui-menu-item a.ui-state-active {
        font-weight: normal;
        margin: -1px;
    }
    .ui-button,  .ui-button-text .ui-button{  
        font-size: 12px;
        padding: 5px;
        margin-left:5px;
        margin-top:15px;
    }
</style>
<script src="<?php echo base_url(); ?>js/flight-reservation.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/number_format.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/number-format.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.autocomplete.css" />
<style type="text/css">
    .ui-dialog {
        z-index: 9999;
    }
</style>
<script type="text/javascript">

    $('document').ready(function() {
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        $("#dialog-form").dialog({
            autoOpen: false,
            width: 350,
            modal: true,
            show: 'fadeIn',
            hide: 'fadeOut',
            position: 'top',
            buttons: {
                "Close": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
        $("#dialog-form-flight").dialog({
            autoOpen: false,
            width: 850,
            height: 550,
            hide: 'fadeOut',
            show: 'fadeIn',
            modal: true,
            position: 'top',
            buttons: {
                "Close": function() {
                    $('#form-search-result').hide();
                    $('#form-pnr-flight').hide();
                    $('#search-form').show();
                    $('#loading-text').hide();
                    $('#flight-from-id').val("");
                    $('#flight-from').val("");
                    $('#flight-to').val("");
                    $('#flight-to-id').val("");
                    $('#list-airline').val("");
                    $('#depart').val("");
                    $('#adl').val(1);
                    $('#chl').val(0);
                    $('#inf').val(0);
                    $(this).dialog("close");
                }
            },
            close: function() {
                $('#form-search-result').hide();
                $('#form-pnr-flight').hide();
                $('#search-form').show();
                $('#form-search-result').hide();
                $('#form-pnr-flight').hide();
                $('#search-form').show();
                $('#loading-text').hide();
                $('#flight-from-id').val("");
                $('#flight-from').val("");
                $('#flight-to').val("");
                $('#flight-to-id').val("");
                $('#list-airline').val("");
                $('#depart').val("");
                $('#adl').val(1);
                $('#chl').val(0);
                $('#inf').val(0);
                location.reload();
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
        $("#dialog-form-hotel").dialog({
            autoOpen: false,
            width: 800,
            height: 600,
            hide: 'fadeOut',
            show: 'fadeIn',
            modal: true,
            position: 'top',
            buttons: {
                "Close": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
        $("#detail-hotel-dialog").dialog({
            autoOpen: false,
            width: 800,
            height: 600,
            hide: 'fadeOut',
            show: 'fadeIn',
            modal: true,
            position: 'top',
            buttons: {
                "Close": function() {
                    $('#dialog-form-flight').hide();
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
        $('#detail-reservation-btn').click(function() {
            $('#dialog-form').dialog("open");
            return false;
        });
        $('#flight-btn').click(function() {
            $('#form-search-result').hide();
            $('#form-pnr-flight').hide();
            $('#search-form').show();
            $('#loading-text').hide();
            $('#flight-from-id').val("");
            $('#flight-from').val("");
            $('#flight-to').val("");
            $('#flight-to-id').val("");
            $('#list-airline').val("");
            $('#depart').val("");
            $('#adl').val(1);
            $('#chl').val(0);
            $('#inf').val(0);
            $('#dialog-form-flight').dialog("open");
            return false;
        });
        $('#hotel-btn').click(function() {
            $('#form-search-result').hide();
            $('#form-pnr-flight').hide();
            $('#search-form').show();
            $('#loading-text').hide();
            $('#flight-from-id').val("");
            $('#flight-from').val("");
            $('#flight-to').val("");
            $('#flight-to-id').val("");
            $('#list-airline').val("");
            $('#depart').val("");
            $('#adl').val(1);
            $('#chl').val(0);
            $('#inf').val(0);
            $('#dialog-form-flight').dialog("open");
            return false;
        });
        $('#train-btn').click(function() {
            $('#form-search-result').hide();
            $('#form-pnr-flight').hide();
            $('#search-form').show();
            $('#loading-text').hide();
            $('#flight-from-id').val("");
            $('#flight-from').val("");
            $('#flight-to').val("");
            $('#flight-to-id').val("");
            $('#list-airline').val("");
            $('#depart').val("");
            $('#adl').val(1);
            $('#chl').val(0);
            $('#inf').val(0);
            $('#dialog-form-flight').dialog("open");
            return false;
        });
        $("#flight-from").autocomplete({
            minLength: 1,
            source:
                    function(req, add) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/reservation_get/get_all_airport",
                            dataType: 'JSON',
                            type: 'POST',
                            data: req,
                            success:
                                    function(data) {
                                        if (data.response == "true") {
                                            add(data.message);
                                        }
                                    },
                        });
                    },
            select:
                    function(event, ui) {
                        $('#flight-from-id').val(ui.item.id);
                    },
        });
        $("#flight-to").autocomplete({
            minLength: 1,
            source:
                    function(req, add) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>index.php/reservation_get/get_all_airport",
                            dataType: 'JSON',
                            type: 'POST',
                            data: req,
                            success:
                                    function(data) {
                                        if (data.response == "true") {
                                            add(data.message);
                                        }
                                    },
                        });
                    },
            select:
                    function(event, ui) {
                        $('#flight-to-id').val(ui.item.id);
                        var from = $('#flight-from-id').val();
                        var to = $('#flight-to-id').val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/reservation/get_available_airline",
                            dataType: "JSON",
                            data: "from_city=" + from + "&to_city=" + to,
                            success: function(data) {
                                $('#list-airline')
                                        .find('option')
                                        .remove()
                                        .end()
                                        .append('<option value="0">--Pilih--</option>');
                                $.each(data, function(i, n) {
                                    var x = document.getElementById("list-airline");
                                    var option = document.createElement("option");
                                    option.text = n['label'] + " (" + n['code'] + ")";
                                    option.value = n['name'];
                                    x.add(option, x.options[null]);
                                });
                            }
                        });
                    },
        });
        $("#depart").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            minDate: new Date(y, m, d),
            dateFormat: "dd/mm/yy",
            onSelect: function(dateText, inst) {
                var date = $(this).datepicker('getDate');
                $('#depart_date').html($.datepicker.formatDate('D', date));
            }
        });
        $("#arrive").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: "dd/mm/yy"
        });

        var from = "";
        var to = "";
        var airline = "";
        var tglflight = "";
        var jmlpenumpang = "";
        var jmlchildren = "";
        var jmlinfant = "";
        var to_city = "";
        var flight_number = "";
        var from_city = ""
        var price = "";
        var depart_time = "";
        var arrive_time = "";
        var kelas = "";
        var airline_code = "";

        $('#search-btn').click(function() {
            $('#loading-text').show();
            from = $('#flight-from-id').val();
            to = $('#flight-to-id').val();
            airline = $('#list-airline').val();
            airline_code = airline;
            tglflight = $('#depart').val();
            jmlpenumpang = $('#adl').val();
            jmlchildren = $('#chl').val();
            jmlinfant = $('#inf').val();
            var tglflight2 = tglflight.replace(/\//, '%2F').replace(/\//, '%2F');
            var dt = "airline=" + airline + "&from_city=" + from + "&to_city=" + to + "&tgl_flight=" + tglflight + "&jml_penumpang=" + jmlpenumpang + "&jml_children=" + jmlchildren + "&jml_infant=" + jmlinfant;
            $('body').css('cursor', 'wait');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/reservation/search_flight",
                data: dt,
                success: function(data) {
                    $('#pass').html("");
                    var content = JSON.parse(data);
                    var error = content.flight.departure.notice.error;
                    var msgerror = content.flight.departure.notice.message;
                    if(error != ""){
                        $('#error-data').html("Error Code : "+error+" - "+msgerror);
                    }
                    
                    for (var i = 0; i < jmlpenumpang; i++) {
                        var p = "<fieldset style=\"font-size: smaller;\">";
                        p += "<legend>Passanger</legend>";
                        p += "<p style=\"font-size:smaller\">Input your personal information : </p>";
                        p += "<table style=\"width: 300px; font-size: smaller;\">";
                        p += "<tr>";
                        p += "<td>Title : </td>";
                        p += "<td><select name=\"titleadlt1[]\" id=\"title\">";
                        p += "<option value=\"Mr\">Mr.</option><option value=\"Mrs\">Mrs.</option><option value=\"Ms\">Ms.</option></select></td></tr><tr><td>Nama Depan : </td><td><input type=\"text\" id=\"firstname\" name=\"firstnameadlt1[]\" /></td></tr><tr><td>Nama Belakang : </td><td><input type=\"text\" id=\"lastname\" name=\"lastnameadlt1[]\" /></td></tr></table></fieldset>";

                        $('#pass').append(p);
                    }

                    for (var j = 0; j < jmlchildren; j++) {
                        var p = "<fieldset style=\"font-size: smaller;\">";
                        p += "<legend>Child</legend>";
                        p += "<p style=\"font-size:smaller\">Input your personal information : </p>";
                        p += "<table style=\"width: 300px; font-size: smaller;\">";
                        p += "<tr>";
                        p += "<td>Title : </td>";
                        p += "<td><select name=\"titleadlt1[]\" id=\"title\">";
                        p += "<option value=\"Mr\">Mr.</option><option value=\"Mrs\">Mrs.</option><option value=\"Ms\">Ms.</option></select></td></tr><tr><td>Nama Depan : </td><td><input type=\"text\" id=\"firstname\" name=\"firstnameadlt1[]\" /></td></tr><tr><td>Nama Belakang : </td><td><input type=\"text\" id=\"lastname\" name=\"lastnameadlt1[]\" /></td></tr></table></fieldset>";

                        $('#pass').append(p);
                    }

                    for (var k = 0; k < jmlinfant; k++) {
                        var p = "<fieldset style=\"font-size: smaller;\">";
                        p += "<legend>Infant</legend>";
                        p += "<p style=\"font-size:smaller\">Input your personal information : </p>";
                        p += "<table style=\"width: 300px; font-size: smaller;\">";
                        p += "<tr>";
                        p += "<td>Title : </td>";
                        p += "<td><select name=\"titleadlt1[]\" id=\"title\">";
                        p += "<option value=\"Mr\">Mr.</option><option value=\"Mrs\">Mrs.</option><option value=\"Ms\">Ms.</option></select></td></tr><tr><td>Nama Depan : </td><td><input type=\"text\" id=\"firstname\" name=\"firstnameadlt1[]\" /></td></tr><tr><td>Nama Belakang : </td><td><input type=\"text\" id=\"lastname\" name=\"lastnameadlt1[]\" /></td></tr></table></fieldset>";

                        $('#pass').append(p);
                    }

                    $('#dialog-form-flight').css('height', '700px;');
                    $('#search-form').hide();
                    $('#form-search-result').fadeIn();
                    $('body').css('cursor', 'auto');
                    $('#data').html(data);
                    $('#dialog-form').css('min-height', '500px');
                    

                    var fromiata = content.flight.result_summary.dep_route.depart.airport_iata;
                    var toiata = content.flight.result_summary.dep_route.arrival.airport_iata;
                    to_city = toiata;
                    from_city = fromiata;
                    var day = $('#depart_date').html();
                    var destination_text = fromiata + " Ke " + toiata + " - " + day + "," + tglflight.replace('%2F', /\//).replace('%2F', /\//);
                    $('#destination-text').html(destination_text);
                    var total = content.flight.departure.results.length;
                    var i = 0;
                    for (i = 0; i < total; i++) {

                        if (content.flight.departure.results[i].seat > 0) {
                            var isi = "<tr>";
                            if (airline == "lionair") {
                                isi += "<td><img src=\"<?php echo base_url(); ?>css/airline_logo/lionair.gif\" />";

                            }
                            else {
                                isi += "<td><img src=\"<?php echo base_url(); ?>css/airline_logo/" + airline + ".png\" />";
                            }

                            isi += content.flight.departure.results[i].airline_name + " - " + content.flight.departure.results[i].flight_number + "</td>";
                            isi += "<td>" + content.flight.departure.results[i].depart_time + "</td>";
                            isi += "<td>" + content.flight.departure.results[i].arrival_time + "</td>";
                            isi += "<td>" + content.flight.departure.results[i].class + "</td>";
                            isi += "<td>" + content.flight.departure.results[i].seat + "</td>";
                            isi += "<td>Rp. " + FormatNumberBy3(content.flight.departure.results[i].total_fares, ".", ".") + "</td>";
                            isi += "<td><input id=\"book-" + i + "\" type=\"radio\" name=\"book-flight\" value=\"" + content.flight.departure.results[i].ftid + "\" />";
                            isi += "</tr>";
                            $('#data2').append(isi);
                            $('#book-' + i).click(function() {
                                var ftid = $(this).val();
                                $('#ftid').html(ftid);
                                var id = $(this).attr('id').split('-')[1];
                                airline = content.flight.departure.results[id].airline_name;
                                price = content.flight.departure.results[id].total_fares;
                                kelas = content.flight.departure.results[id].class;
                                depart_time = content.flight.departure.results[id].depart_time;
                                arrive_time = content.flight.departure.results[id].arrival_time;
                                flight_number = content.flight.departure.results[id].flight_number;
                            });
                        }
                    }
                }
            });
        });
        $('#booking-btn').click(function() {
            var ftid = $('#ftid').html();
            $('body').css('cursor', 'wait');
            if (ftid != "") {
//                $.ajax({
//                    type: "POST",
//                    url: "<?php echo base_url(); ?>index.php/reservation/get_build_pnr",
//                    data: "ftid=" + ftid,
//                    success: function(data) {
                $('#form-search-result').hide();
                $('#form-pnr-flight').fadeIn();
                $('body').css('cursor', 'auto');
                var summary_text = "Total Price for " + jmlpenumpang + " Adult, " + jmlchildren + " Child, " + jmlinfant + " Infant";
                var summary_price = "<b>Published Fare : IDR " + FormatNumberBy3(price) + "</b>";
                $('#summary-text').html(summary_text);
                $('#summary-price').html(summary_price);
                var datanote = "Direct Flight";
                var itinerary_data = "<tr>";
                itinerary_data += "<td>" + flight_number + "</td><td>" + from_city + " " + tglflight + "</td>";
                itinerary_data += "<td>" + to_city + " " + tglflight + "</td>";
                itinerary_data += "<td>" + kelas + "</td><td>" + datanote + "</td>";
                itinerary_data += "</tr>";
//                alert(itinerary_data);
                $('#itinerary-tbl').append(itinerary_data);
//                    }
//                });
            }
        });
        $('#finish-button').click(function() {
            $('body').css('cursor', 'wait');
            $(this).attr('disabled', 'disabled');
            var ftid = $('#ftid').html();
            var title = $('#title').val();
            var gender = 'male';
            if (title == 'MRS' || title == 'MS') {
                gender = 'female';
            }
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var titlecp = $('#title-cp').val();
            var firstnamecp = $('#firstname-cp').val();
            var lastnamecp = $('#lastname-cp').val();
            var countrycode = $('#countrycode-cp').val();
            var phonenumbercp = $('#phonenumber-cp').val();
            var reqid = $('#req_id').html();
            var empnum = $('#emp_num').html();
            var sppdnum = $('#sppd_num').html();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/reservation/process_booking",
                data: "ftid=" + ftid + "&titleadlt=" + title + "&firstnameadlt=" + firstname + "&lastnameadlt=" + lastname + "&contacttitle=" + titlecp + "&contactfirstname=" + firstnamecp + "&contactlastname=" + lastnamecp + "&countrycode=" + countrycode + "&contactphone=" + phonenumbercp + "&reqid=" + reqid + "&empnum=" + empnum + "&airline=" + airline + "&depart=" + depart_time + "&arrive=" + arrive_time + "&from_city=" + from_city + "&to_city=" + to_city + "&flight_number=" + flight_number + "&sppdnum=" + sppdnum + "&price=" + price + "&tglflight=" + tglflight + "&class=" + kelas + "&airline_code=" + airline_code,
                success: function(data) {
                    $('body').css('cursor', 'auto');
                    var content = data.split('!@#');
                    $('#res_flight').val(content[0]);
                    var booking_code = content[1];
                    var datelimit = content[2];
                    alert('Booking Success \nYour booking code : ' + booking_code + '\nDate/Time Limit : ' + datelimit);
                    $('#pas-form').submit();
                }
            });
        });
        $('#cntry').change(function() {
            var country = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/reservation/get_list_cities",
                data: "id_country=" + country,
                dataType: "JSON",
                success: function(data) {
                    $('#city')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="0">--Pilih--</option>');
                    for (var i = 0; i < data.Cities[0].length; i++) {
                        var x = document.getElementById("city");
                        var option = document.createElement("option");
                        option.text = data.Cities[0][i].City.Name;
                        option.value = data.Cities[0][i].City.IdCity;
//                        option.text = data[i].city_name;
//                        option.value = data[i].city_id;
                        x.add(option, x.options[null]);
                    }
                }
            });
        });
        $("#check_out").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: "yy-mm-dd",
            minDate: new Date(y, m, d),
            onSelect: function() {
                var date = $(this).datepicker('getDate');
                var checkin = $('#check_in').datepicker('getDate');
                var dayDiff = Math.ceil((date - checkin) / (1000 * 60 * 60 * 24));
                $('#lama').val(dayDiff);
            }
        });
        $("#check_in").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            minDate: new Date(y, m, d),
            dateFormat: "yy-mm-dd",
            onClose: function(selectedDate) {
                $("#check_out").datepicker("option", "minDate", selectedDate);
            }
        });
        $('#search-form-hotel').click(function() {
            $('#loading-text2').show();
            var city_code = $('#city').val();
            var hotel_name = $('#hotel_name').val();
            var checkin_date = $('#check_in').val();
            var checkout_date = $('#check_out').val();
            var lama = $('#lama').val();
            var adult = $('#adult').val();
            var child = $('#child').val();
            var cot = $('#cot').val();
            var rooms = $('#rooms').val();
            $('body').css('cursor', 'wait');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/reservation/search_hotel",
                data: "city_code=" + city_code + "&hotel_name=" + hotel_name + "&checkin_date=" + checkin_date + "&checkout_date=" + checkout_date + "&lama=" + lama + "&adult=" + adult + "&child=" + child + "&cot=" + cot + "&rooms=" + rooms,
                success: function(data) {
                    alert(data);
                    var content = JSON.parse(data);
                    $('body').css('cursor', 'auto');
                    $('#loading-text2').hide();
                    $('#search-hotel-form').hide();
                    $('#list-all-hotel').fadeIn();
                    $('#content-hotel').html(data);
                    $('#info-tbl').html("");
                    var isi = "<tr>";
                    isi += "<td>City</td>";
                    isi += "<td>" + content.Response.SearchQueries.City + "</td>";
                    isi += "</tr>";
                    isi += "<tr>";
                    isi += "<td>Checkin Date</td>";
                    isi += "<td>" + content.Response.SearchQueries.CheckinDate + "</td>";
                    isi += "</tr>";
                    isi += "<tr>";
                    isi += "<td>Checkout Date</td>";
                    isi += "<td>" + content.Response.SearchQueries.CheckoutDate + "</td>";
                    isi += "</tr>";
                    isi += "<tr>";
                    isi += "<td>Durasi</td>";
                    isi += "<td>" + content.Response.SearchQueries.NightDuration + " Hari</td>";
                    isi += "</tr>";
                    $('#info-tbl').html(isi);
                    $('#result-hotel').html("");
                    var total = content.Response.Hotels.length;
                    for (var i = 0; i < total; i++) {

                        var konten = "";
                        if (i == (total - 1)) {
                            konten = "<div class=\"hotel-content-last\">";
                        }
                        else {
                            konten = "<div class=\"hotel-content\">";
                        }

                        konten += "<div class=\"hotel-content-img\">";
                        konten += "<img class=\"hotel-pic\" src=\"<?php echo base_url(); ?>css/hotel.jpg\" /></div>";
                        konten += "<div class=\"hotel-content-desc\">";
                        konten += "<h4>" + content.Response.Hotels[i].Hotel.HotelInfo.HotelName + "</h4>";
                        konten += "<p>Address : " + content.Response.Hotels[i].Hotel.HotelInfo.Address + " | Telephone : " + content.Response.Hotels[i].Hotel.HotelInfo.Telephone + "</p>";
                        konten += "<p>Rating : <b>" + content.Response.Hotels[i].Hotel.HotelInfo.Rating + " Star</b> | Roomtype : <b>" + content.Response.Hotels[i].Hotel.DetailPrices[0].Prices.Room.RoomType + "</b> | Bed : <b>" + content.Response.Hotels[i].Hotel.DetailPrices[0].Prices.Room.Bed + "</b></p>";
                        konten += "<a href=\"#" + content.Response.Hotels[i].Hotel.HotelInfo.Code + "\" class=\"view-desc-" + i + "\" style=\"font-size: smaller;\">View Description...</a>";
                        konten += "</div>";
                        var price = content.Response.Hotels[i].Hotel.HotelInfo.StartedPrice;
                        konten += "<div class=\"hotel-content-price\">";
                        konten += "<p><b>Price : </b></p>";
                        konten += "<p style=\"font-size: smaller;\"><b>Rp. " + FormatNumberBy3(price) + "</b></p>";
                        konten += "<a href=\"#" + content.Response.Hotels[i].Hotel.HotelInfo.Code + "\" class=\"book-btn-" + i + "\" style=\"font-size: smaller; margin-left:5px;\">Book Now</a>";
                        konten += "</div></div>";
                        $('#result-hotel').append(konten);
                        $('.view-desc-' + i).click(function() {
                            $('body').css('cursor', 'wait');
                            var code = $(this).attr('href').substring(1);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>index.php/reservation/get_detail_hotel",
                                data: "hotel=" + code,
                                success: function(data) {
                                    $('body').css('cursor', 'auto');
                                    var content = JSON.parse(data);
                                    var detail = "Address : " + content.DetailHotel.Address + " | Telephone : " + content.DetailHotel.Telephone + " | Rating : " + content.DetailHotel.Rating + " Star";
                                    $('#name-content').html(content.DetailHotel.HotelName);
                                    $('#address-content').html(detail);
                                    $('#city-content').html(content.DetailHotel.CityName + " , " + content.DetailHotel.CountryName);
                                    $('#contact-content').html(content.DetailHotel.Contact);
                                    $('#note-content').html(content.DetailHotel.Note);
                                    $('#desc-content').html(content.DetailHotel.Description);
                                    $('#detail-hotel-dialog').dialog('open');
                                }
                            });
                        });
                        $('.book-btn-' + i).button();
                        $('.book-btn-' + i).click(function() {
                            var code = $(this).attr('href').substring(1);
                            alert(code);
                        });
                    }
                }
            });
        });
        $('.book-btn').button();
        $('#flight-btn').button();
        $('#hotel-btn').button();
        $('#keluar-btn').button();


        $('.btn-cancel').click(function() {
            var res_id = $(this).attr('id').split('-')[1];
            var req_id = $('#req_id').html();
            $('#res_id').val(res_id);
            $('#req_id_data').val(req_id);
            $('#form_cancel').submit();
        });

        $('.btn-cancel').button();
    });

</script>
<div id="dialog-form" title="Lihat Deskripsi">

    <?php
    $row = $reservation->row();
    ?>
    <p id="req_id" style="display:none;"><?php echo $row->req_id; ?></p>
    <fieldset>
        <legend>Deskripsi Request Airline</legend>
        <p id="flight-desc" style="font-size: smaller;"><?php echo $row->flight_desc; ?></p>
    </fieldset>
    <fieldset>
        <legend>Request Waktu Keberangkatan</legend>
        <p id="time-desc" style="font-size: smaller;"><?php echo $row->time_desc; ?></p>
    </fieldset>
    <fieldset>
        <legend>Deskripsi Request Hotel</legend>
        <p id="hotel-desc" style="font-size: smaller;"><?php echo $row->hotel_desc; ?></p>
    </fieldset>
</div>


<div id="dialog-form-flight" title="Reservasi" >
    <div style="border-bottom: 1px dotted black;">
        <h4 style="margin-left:20px; margin-bottom: 5px;">Form Reservasi</h4>

    </div>
    <div id="search-form">
        <fieldset>
            <legend style="font-size:smaller">Cari Airline</legend>
            <table style="font-size:smaller; margin-top: 5px; width: 650px;">
                <tr>
                    <td>From</td>
                    <td> : <input type="text" id="flight-from" style="width: 250px;" /></td>
                <input type="hidden" id="flight-from-id" />


                <td></td>
                <td>To</td>
                <td> : <input type="text" id="flight-to" style="width: 250px;" /></td>
                <input type="hidden" id="flight-to-id" />
                </tr>
                <tr>
                    <td>Airline</td>
                    <td colspan="2"> : <select name="airline" id="list-airline" style="min-width:100px;">
                            <option value="0">--Pilih Airline--</option>
                        </select></td>

                </tr>
                <tr>
                    <td>Depart</td>
                    <td colspan="2"> : <input type="text" id="depart" name="depart" /></td>
                <p id="depart_date" style="display:none;"></p>

                <p id="arrive_date" style="display:none;"></p>
                </tr>
                <tr>
                    <td>Trip Type</td>
                    <td colspan="2"> : One Way</td>
                </tr>
                <tr>
                    <td>Dewasa</td>
                    <td> : <select name="adl" id="adl">
                            <option value="0" >0</option>
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> Anak : <select name="chl" id="chl">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option></select>
                        Inf : <select name="inf" id="inf">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td colspan="4"><button id="search-btn">Cari Airline</button></td>
                    <td><p id="loading-text" style="font-size: smaller; display: none;"><img src="<?php echo base_url(); ?>css/ajax-loader.gif" style="width: 20px; height:10px;" /> &nbsp; Connecting To Service...</p></td>
                </tr>
            </table>
        </fieldset>

    </div>
    
    <div id="search-form">
        <fieldset>
            <legend style="font-size:smaller">Cari </legend>
            <table style="font-size:smaller; margin-top: 5px; width: 650px;">
                <tr>
                    <td>From</td>
                    <td> : <input type="text" id="flight-from" style="width: 250px;" /></td>
                <input type="hidden" id="flight-from-id" />


                <td></td>
                <td>To</td>
                <td> : <input type="text" id="flight-to" style="width: 250px;" /></td>
                <input type="hidden" id="flight-to-id" />
                </tr>
                <tr>
                    <td>Airline</td>
                    <td colspan="2"> : <select name="airline" id="list-airline" style="min-width:100px;">
                            <option value="0">--Pilih Airline--</option>
                        </select></td>

                </tr>
                <tr>
                    <td>Depart</td>
                    <td colspan="2"> : <input type="text" id="depart" name="depart" /></td>
                <p id="depart_date" style="display:none;"></p>

                <p id="arrive_date" style="display:none;"></p>
                </tr>
                <tr>
                    <td>Trip Type</td>
                    <td colspan="2"> : One Way</td>
                </tr>
                <tr>
                    <td>Dewasa</td>
                    <td> : <select name="adl" id="adl">
                            <option value="0" >0</option>
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> Anak : <select name="chl" id="chl">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option></select>
                        Inf : <select name="inf" id="inf">
                            <option value="0" selected="selected">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td colspan="4"><button id="search-btn">Cari Airline</button></td>
                    <td><p id="loading-text" style="font-size: smaller; display: none;"><img src="<?php echo base_url(); ?>css/ajax-loader.gif" style="width: 20px; height:10px;" /> &nbsp; Connecting To Service...</p></td>
                </tr>
            </table>
        </fieldset>

    </div>
    <div id="form-search-result" style="display:none;">
        <p style="font-size: smaller; margin-left:20px;"><b>Search Result : </b></p>
        <div id="tambah" style="padding-left:20px;">
            <p style="font-size: smaller;" id="destination-text"></p>
            <p id="error-data" style="font-size: smaller;"></p>
            <table id="flight-data" style="width:650px; font-size: smaller; text-align: center;">
                <thead style="background-color: black; color: white;">
                <th>Airline</th>
                <th>Depart</th>
                <th>Arrive</th>
                <th>Kelas</th>
                <th>Kursi Tersedia</th>
                <th>Harga</th>
                <th>Select</th>
                </thead>
                <tbody id='data2'>
                    
                </tbody>
                <tbody id='footer'>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button id='booking-btn'>Booking</button></td>
                    </tr>
                </tbody>
            </table>
            <p id='ftid' style='display:none;'></p>
        </div>

    </div>
    <div id="form-pnr-flight" style="display:none;">
        <h5 style="margin-left:20px">Passanger Name Record - PNR</h5>
        <fieldset style="font-size:smaller;">
            <legend>Itinerary</legend>
            <p style="font-size:smaller;">Depart Flight : </p>
            <table id="itinerary-tbl" style="font-size: smaller; text-align: center; width: 550px;">
                <thead style="background-color: black; color:white; ">
                <th>No Flight</th>
                <th>Depart</th>
                <th>Arrive</th>
                <th>Class</th>
                <th>Catt</th>
                </thead>
            </table>
        </fieldset>

        <fieldset style="font-size: smaller;">
            <legend>Summary</legend>
            <p style="margin-left:20px; font-size: smaller;" id="summary-text"></p>
            <p style="margin-left:20px; font-size: smaller;" id="summary-price"></p>
        </fieldset>
        <div>
            <form id="pas-form" action="<?php echo base_url(); ?>index.php/reservation/add_passanger_data" method="post">
                <input type="hidden" name="flight_id" id="res_flight" />
                <input type="hidden" name="req_id" id="req_id" value="<?php echo $row->req_id; ?>" />;
                <fieldset id="pass">
                    
                </fieldset>
                <input type="submit" style="display:none;" id="submit-pas" />
            </form>
        </div>

        <fieldset style="font-size:smaller;">
            <legend>Contact Person</legend>
            <table style="width: 300px; font-size: smaller;">
                <tr>
                    <td>Title : </td>
                    <td><select name="titleadlt1" id="title-cp">
                            <option value="Mr">Tn.</option>
                            <option value="Mrs">Ny.</option>
                            <option value="Ms">Nn.</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Nama Depan : </td>
                    <td><input type="text" id="firstname-cp" name="firstnameadlt1" /></td>
                </tr>
                <tr>
                    <td>Nama Belakang : </td>
                    <td><input type="text" id="lastname-cp" name="lastnameadlt1" /></td>
                </tr>
                <tr>
                    <td>No Telp : </td>
                    <td><input type="text" id="countrycode-cp" name="countrycode" style="width:50px;" value="62" /><input type="text" name="contactphone" id="phonenumber-cp"/></td>
                </tr>
            </table>
        </fieldset>
        <div style="text-align: right;">
            <button id="finish-button" style="font-size:smaller;">Selesai</button>
        </div>
    </div>
</div>
<div id="dialog-form-hotel" title="Reservasi Hotel">
    <div style="border-bottom: 1px dotted black;">
        <h4 style="margin-left:20px; margin-bottom: 5px;">Form Reservasi Hotel</h4>

    </div>
    <div id="search-hotel-form">
        <fieldset>
            <legend>Cari Hotel</legend>
            <table style="font-size: smaller; margin-top: 5px; width: 550px;">
                <tr>
                    <td>Negara : </td>
                    <td><select name="country" id="cntry" style="width:250px;">
                            <option value="">--Pilih Negara--</option>
                            <option value="ID">Indonesia</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Kota : </td>
                    <td><select name="city" id="city" style="width:250px;">
                            <option value="">--Pilih--</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Nama Hotel : </td>
                    <td><input type="text" name="hotel_name" id="hotel_name" style="width:250px;"/></td>
                </tr>
                <tr>
                    <td>Check In </td>
                    <td><input type="text" name="check_in" id="check_in" /></td>
                </tr>
                <tr>
                    <td>Check Out </td>
                    <td><input type="text" name="check_out" id="check_out"/></td>
                </tr>
                <tr>
                    <td>Lama</td>
                    <td><input type="text" name="lama" id="lama" readonly="readonly" style="width:50px;"/> Hari</td>
                </tr>
                <tr>
                    <td>Bed : </td>
                    <td><select name="bed" id="bed" style="width: 120px;">
                            <option value="">Pilih Bed</option>
                            <option value="SB">Single Bed</option>
                            <option value="DB">Double Bed</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Rooms</td>
                    <td><select name="num_rooms" id="rooms">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></td>

                </tr>
                <tr>
                    <td>Orang</td>
                    <td>Dewasa : <select id="adult">
                            <option value="0">0</option>
                            <option value="1" selected="selected">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        Anak : <select id="child">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> 
                        Cot : <select id="cot">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>Rating / Star</td>
                    <td><select name="ratings">
                            <option value="0">All</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                        </select></td>
                </tr>
                <tr>
                    <td><button id="search-form-hotel">Search</button></td>
                    <td><p id="loading-text2" style="font-size: smaller; display: none;"><img src="<?php echo base_url(); ?>css/ajax-loader.gif" style="width: 20px; height:10px;" /> &nbsp; Connecting To Service...</p></td>
                </tr>
            </table>

        </fieldset>
    </div>


    <style type="text/css">
        .hotel-content, .hotel-content-last {
            border-top:1px dotted black;
            min-height: 110px;
            padding-bottom: 5px;
        }

        .hotel-content-last {
            border-bottom:1px dotted black;
        }

        .hotel-content-img {
            width:99px;
            height:110px;
            border-right: 1px dotted black;
            float:left;
        }

        .hotel-content-desc {
            width:409px;
            height: 110px;
            padding-left: 20px;
            float:left;
            border-right: 1px dotted black;
        }

        .hotel-content-price {
            width:170px;
            height: 110px;
            float:left;
        }

        .hotel-content-desc h4 {
            margin-top:10px;
        }
        .hotel-content-desc p {
            font-size: smaller;
        }

        .hotel-content-price p {
            margin-left:5px;
        }

        .hotel-pic{
            margin-left:10px;
            margin-top: 10px;
            width:80px;
            height: 80px;
        }

    </style>
    <div id="list-all-hotel" style="display:none;">
        <fieldset style="font-size: smaller;">
            <legend>Informasi</legend>
            <table id="info-tbl" style="font-size: smaller;">

            </table>
        </fieldset>
        <fieldset style="font-size: smaller">
            <legend>Search Result</legend>
            <div id="result-hotel">

            </div>


        </fieldset>

    </div>

    <div id="pnr-hotel" style="display:none;">
        <fieldset>
            <legend>Itinerary</legend>
            <table>
                <tr>
                    <td>Nama Hotel : </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Checkin Date : </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Checkout Date : </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Total Durasi Waktu : </td>
                    <td></td>
                </tr>
            </table>
        </fieldset>
    </div>


</div>
<style type="text/css">
    #detail-hotel-dialog {
        width:650px;
        height:400px;
    }

    #hotel-img-data {
        width: 120px;
        height:100px;
        border-right: 1px dotted black;
        float:left;
    }
    #hotel-desc-data {
        width:530px;
        height:100px;
        float:left;
        padding-left: 10px;
        margin-top:0px;
    }

    #address-content, #city-content {
        font-size:smaller;
    }

    #hotel-desc-data h4 {
        margin-top:5px;
    }

    #hotel-data {
        width:500px;

    }
    #hotel-data table{
        font-size: smaller;
    }
</style>
<div id="detail-hotel-dialog" title="Detail hotel">

    <fieldset style="font-size: smaller;">
        <legend>Hotel Information</legend>
        <div id="hotel-img-data">
            <img class="hotel-pic" src="<?php echo base_url(); ?>css/hotel.jpg" />
        </div>
        <div id="hotel-desc-data">
            <h4 id="name-content">Hotel Name</h4>
            <p id="address-content">Address : Jl. AAA | Telephone : 2124334 | Rating : 3 star</p>
            <p id="city-content">Denpasar, Bali, Indonesia</p>

        </div>            
    </fieldset>
    <fieldset style="font-size:smaller;">
        <legend>Hotel Description</legend>
        <div id="hotel-data">
            <table style="width:670px;" >
                <tr>
                    <td><b>Kontak : </b></td>
                    <td id="contact-content"></td>
                </tr>
                <tr>
                    <td><b>Catatan : </b></td>
                    <td id="note-content"></td>
                </tr>
                <tr>
                    <td style="width:200px;"><b>Deskripsi : </b></td>
                    <td id="desc-content"></td>
                </tr>
            </table>
        </div>

    </fieldset>
</div>

<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Detail Reservasi</h2>



    <fieldset>
        <legend>Detail Pemohon</legend>
        <table style="width: 700px;">
            <tr>
                <td><b>No. SPPD</b></td>
                <td> : <?php echo $row->sppd_id; ?></td>
            </tr>
            <tr>
                <td><b>Tanggal SPPD</b></td>
                <td> : <?php echo $row->sppd_tgl; ?></td>
            </tr>
            <p id="req_id" style="display:none;"><?php echo $row->req_id; ?></p>
            <p id="sppd_num" style="display:none;"><?php echo $row->sppd_num; ?></p>
            <p id="emp_num" style="display: none;"><?php echo $row->emp_num; ?></p>
            <tr>
                <td><b>Deskripsi SPPD</b></td>
                <td> : <?php echo $row->sppd_tuj; ?></td>
            </tr>
            <tr>
                <td><b>Pemohon</b></td>
                <td> : <?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . "-" . $row->emp_id . "/" . $row->org_code; ?></td>
            </tr>
            <tr>
                <td><b>Dari - Ke</b></td>
                <td> : <?php echo $row->sppd_dest; ?></td>
            </tr>
            <tr>
                <td><b>Tanggal Berangkat - Pulang</b></td>
                <td> : <?php echo $row->sppd_depart . " - " . $row->sppd_arrive; ?></td>
            </tr>
            <tr>
                <td><b>No Kontak</b></td>
                <td> : <?php echo $telp; ?></td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td> : <?php echo $row->emp_email; ?></td>
            </tr>
            <tr>
                <td><b>Deskripsi Permintaan Reservasi</b></td>
                <td> : <button id="detail-reservation-btn">Detail Permintaan</button></td>
            </tr>
        </table>
    </fieldset>
    <h3 style="margin: 0px; padding: 20px; text-align: left;">List Proses Reservasi</h3>


    <?php
    if ($booking->num_rows() > 0) {
        foreach ($booking->result() as $rowdt) {
            ?>
            <div class="content-flight" style="border-top:1px dotted black; border-bottom: 1px dotted black; width:900px; height:140px; margin-left:30px; height: 140px; margin-bottom: 40px;">
                <div class="cont-img" style="float:left;border-right:1px dotted black; height: 140px; width: 120px">
                    <img src="<?php echo base_url(); ?>css/airline_logo/<?php echo $rowdt->flight_code; ?>-big.jpg" style="width:100px; height: 50px; margin-top: 35px; margin-left: 10px;"/>
                </div>
                <div class="cont-desc" style="width:600px; height:140px; float:left;">
                    <p style="margin-left:20px;"><b><?php echo $rowdt->flight_name; ?> - <?php echo $rowdt->flight_number; ?> ( <?php echo $rowdt->from_city; ?> To <?php echo $rowdt->to_city; ?> )</b> (BOOKING CODE : <b><?php echo $rowdt->booking_id; ?></b>)</p>
                    <p style="margin-left:20px; font-size: smaller;">Depart Date : <?php echo $rowdt->depart_date . " Pk." . $rowdt->depart_time; ?> | Arrive Date : <?php echo $rowdt->arrive_date . " Pk." . $rowdt->arrive_time; ?></p>
                    <p style="margin-left:20px; font-size: smaller;"><b>Tanggal Reservasi :</b> <?php echo $rowdt->booking_date; ?> | <b>Limit Date :</b> <?php echo $rowdt->limit_date; ?></p>
                    <p style="margin-left:20px; font-size: smaller;">Status : <b><?php
                            if ($rowdt->confirm == 0) {
                                echo 'Belum di confirm';
                            } else {
                                if ($rowdt->confirm == 1) {
                                    echo "Telah di confirm";
                                } else {
                                    echo "Canceled";
                                }
                            }
                            ?> </b></p>
                </div>
                <div class="cont-opsi" style="width:100px; height: 140px; float:left; padding-left:40px; padding-top: 40px;">
                    <?php if ($rowdt->confirm == 0) {
                        ?>
                        <a href="#" class="btn-cancel" id="book-<?php echo $rowdt->res_id; ?>">Cancel</a>
                        <?php
                    } else {
                        if ($rowdt->confirm == 2) {
                            ?>
                            <p>Flight Canceled</p>
                            <?php
                        } else {
                            ?>
                            <p>Flight Confirmed</p>

                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div id="status">
            <p style="margin-left:20px;"><b>Data Reservasi Belum Ada</b></p>
        </div>
        <?php
    }
    ?>
    <?php if ($row->status == 1) { ?>
        <fieldset style="padding-left: 45px; margin-top: 30px;">
            <legend>Opsi</legend>
            <a href="#" id="flight-btn">Reservasi</a>
            <!--<a href="#" id="hotel-btn">Reservasi Hotel</a>-->
            <a href="<?php echo base_url(); ?>index.php/reservation/finish_req/id/<?php echo $row->req_id; ?>" id="keluar-btn">Selesai</a>

        </fieldset>
        <?php
    }
    ?>

    <form id="form_cancel" method="post" action="<?php echo base_url(); ?>index.php/reservation/cancel_book">
        <input type="hidden" id="res_id" name="res_id"/>
        <input type="hidden" id="req_id_data" name="req_id"/>
    </form>
</div>
