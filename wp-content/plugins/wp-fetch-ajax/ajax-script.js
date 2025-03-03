jQuery(document).ready(($) => {
  $('#custom-ajax-button').click(() => {
    $.ajax({
      url: ajax_fetch_object.ajax_url,
      type: "POST",
      data: {
        action: "ajax_get_request"
      },
      success: (response) => {
        if (response.success) {
          console.log(response.data);
          $("#custom-ajax-response").html(response.data);
        } else {
          $("#custom-ajax-response").html("Error fetching data");
        }
      }
    })
  })
})