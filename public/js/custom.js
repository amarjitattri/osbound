$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#sidebar").mCustomScrollbar({
    theme: "minimal"
  });

  $('#dismiss, .overlay').on('click', function () {
    $('#sidebar').removeClass('active');
    $('.overlay').removeClass('active');
  });

  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').addClass('active');
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });

  $('#outboundsModel').on('show.bs.modal', function (e) {
    let loadUrl = $(e.relatedTarget).data('load-url');
    let title = $(e.relatedTarget).data('modal-title');
    let width = $(e.relatedTarget).data('modal-width');
    $(this).find('.modal-title').html(title);
    $(this).find('.modal-body').load(loadUrl);
    $(this).find('.modal-dialog').css({width: width});
  });

});

function getVals() {
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
  var slide1 = parseFloat(slides[0].value);
  var slide2 = parseFloat(slides[1].value);
  // Neither slider will clip the other, so make sure we determine which is larger
  if (slide1 > slide2) {
    var tmp = slide2;
    slide2 = slide1;
    slide1 = tmp;
  }

  var displayElement = parent.getElementsByClassName("rangeValues")[0];
  displayElement.innerHTML = "<b>Range:</b> AED " + slide1 + " - AED " + slide2;
}

function vatCalc(cost, vat, onlyVat = false) {
  let includingVat = (parseFloat(cost) / 100) * (parseFloat(vat) + 100);
  if (onlyVat) {
    includingVat -= cost;
  }
  return includingVat.toFixed(2);
}

window.onload = function () {
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
  for (let x = 0; x < sliderSections.length; x++) {
    let sliders = sliderSections[x].getElementsByTagName("input");
    for (let y = 0; y < sliders.length; y++) {
      if (sliders[y].type === "range") {
        sliders[y].oninput = getVals;
        sliders[y].oninput();
      }
    }
  }
}

function estimatesVatCalculate(that) {
  let index = that.data('index'), amount = $(`#estimate_amount_${index}`).val(),
    vat = $(`#estimate_amount_vat_rate_${index}`).val();
  console.log("index " + index);
  console.log("amount " + amount);
  console.log("vat " + vat);

  $(`#estimate_amount_vat_${index}`).val(vatCalc(amount, vat, true));
  $(`#estimate_amount_total_amount_${index}`).val(vatCalc(amount, vat));
}

function estimatesDomVatCalculate(that) {
  let index = that.data('index'), amount = $(`#dom_amount_${index}`).val(),
    vat = $(`#dom_vat_rate_${index}`).val();
  console.log("index " + index);
  console.log("amount " + amount);
  console.log("vat " + vat);

  $(`#dom_amount_vat_${index}`).val(vatCalc(amount, vat, true));
  $(`#dom_amount_total_amount_${index}`).val(vatCalc(amount, vat));
}

$(function () {
  $('.datepicker').datetimepicker({
    timepicker: false,
    format: 'd-m-Y',
    inverseButton: false,
    todayButton: false,
  });
  $('.date_timepicker').datetimepicker({
    format: 'd-m-Y H:i',
    inverseButton: false,
    todayButton: false,
    step: 15,
  });
  $(document).on('keyup', '.calculate_vat', function () {
    estimatesVatCalculate($(this));
  });
  $(document).on('change', '.change_vat_rate', function () {
    estimatesVatCalculate($(this));
  });
  $(document).on('keyup', '.dom_calculate_vat', function () {
    estimatesDomVatCalculate($(this));
  });
  $(document).on('change', '.dom_change_vat_rate', function () {
    estimatesDomVatCalculate($(this));
  });
  $(document).on('click', '.image_thumb_grid li', function () {
    let imageUrl = $(this).data('src');
    $("#preview_image_section").css("background-image", `url(${imageUrl})`);
    if ($('input:checkbox.selected_images:checked').length) {
      $("#delete_selected_images").prop('disabled', false);
    } else {
      $("#delete_selected_images").prop('disabled', true);
    }
  });
  $(document).on('click', 'input:checkbox.selected_audios', function () {
    if ($('input:checkbox.selected_audios:checked').length) {
      $("#delete_selected_audios").prop('disabled', false);
    } else {
      $("#delete_selected_audios").prop('disabled', true);
    }
  });
  $(document).on('click', '#add_new_contact_btn', function () {
    $("#company_contacts_form fieldset").prop('disabled', false);
  });
  $(document).on('change', '#contact_name', function () {
    if ($("#contact_company").val() == 0) {
      $.get($(this).data('route'), {
        name: $(this).find('option:selected').text()
      }, function (data) {
        $(document).find("#contact_company").html('<option value="0">--SELECT--</option>');
        $.each(data, function (i, v) {
          $(document).find("#contact_company").append('<option value="' + v.id + '">' + v.company + '</option>');
        })
      });
    }
  });
  $(document).on('change', '#contact_company', function () {
    if ($("#contact_name").val() == 0) {
      $.get($(this).data('route'), {
        company: $(this).find('option:selected').text()
      }, function (data) {
        $(document).find("#contact_name").html('<option value="0">--SELECT--</option>');
        $.each(data, function (i, v) {
          $(document).find("#contact_name").append('<option value="' + v.id + '">' + v.name + '</option>');
        })
      });
    }
  });
  $(document).on('change', '#company_contacts_form #company,#company_contacts_form #name', function () {
    $.ajax({
      url: `${base_url()}/check_company_contact_exits`,
      type: "get",
      data: {
        name: $("#name").val(), company: $("#company").val()
      },
      success: function (data) {
        if (data.error) {
          $("#add_new_contact_submit_btn").prop('disabled', true);
          $("#company_contact_error").text(data.msg).show();
        } else {
          $("#add_new_contact_submit_btn").prop('disabled', false);
          $("#company_contact_error").text('').hide();
        }
      }
    })
  });
  $(document).on('click', '#contact_company_reset_btn', function () {
    $.get(`${base_url()}/company-contact-both`, function (data) {
      $(document).find("#contact_company").html('<option value="0">--SELECT--</option>');
      $(document).find("#contact_name").html('<option value="0">--SELECT--</option>');
      $.each(data.names, function (i, v) {
        $(document).find("#contact_name").append('<option value="' + i + '">' + v + '</option>');
      })
      $.each(data.companies, function (i, v) {
        $(document).find("#contact_company").append('<option value="' + i + '">' + v + '</option>');
      })
    });
  });
  $("#company_contacts_form").validate({
    submitHandler: function (form) {
      $(form).ajaxSubmit({
        resetForm: true,
        target: "#company_contact_details_div"
      });
      return false;
    }
  });
  $("#enquiry_create_form").validate({
    submitHandler: function (form) {
      let bar = $("#formSubmitProgressBar .progress-bar");
      $(form).ajaxSubmit({
        resetForm: true,
        beforeSerialize: function ($form, options) {
          let description = CKEDITOR.instances.description.getData();
          $('#description_hidden').val(description);
        },
        beforeSend: function () {
          $("#formSubmitStatus").show();
          let percentVal = '0%';
          bar.width(percentVal).html(percentVal);
          $(form).find(":input").prop("disabled", true);
        },
        uploadProgress: function (event, position, total, percentComplete) {
          let percentVal = percentComplete + '%';
          bar.width(percentVal).html(percentVal);
        },
        success: function (res) {
          let percentVal = '100%';
          bar.width(percentVal).html(percentVal);
          $("#formSubmitStatus").hide();
          toastr.success(res.message);
          window.location.href = res.route;
        }
      });
    }
  });
  $(document).on('click', "#updateEnquiryBtn", function () {
    $("#updateEnquiryForm").submit();
  });
  $(document).on('click', "#saveEstimateBtn", function () {
    //$("#contact_name_id").val($("#contact_name").val());
    //$("#contact_company_id").val($("#contact_company").val());
    $("#estimateForm").submit();
  });
  $("#estimateForm").validate();
  $("#updateEnquiryForm").validate();
  $(".custom-file-input").on("change", function () {
    $(this).siblings(".custom-file-label").addClass("selected").html($(this).val().split("\\").pop());
  });
  window.setTimeout(function () {
    $(".alert").alert('close');
  }, 5000);
});


$(document).ready(function () {
    $('#tasks .input-group-addon').click(function (e) {
      $(this).siblings("input").trigger('focus');
    });
    $("#jobtags .ms-list li").click(function () {
      $(this).addClass('selected').siblings().removeClass('selected');
    });
    $("#apj-nav-tabs .nav-item a").click(function () {
      $("#apj-nav-tabs .nav-item a").removeClass('active');
      $(this).addClass('active');
      var newpane = $(this).attr("href");
      $(".apj-tab-s .tab-pane").removeClass('active');
      $(newpane).addClass('active');
    });
  });
