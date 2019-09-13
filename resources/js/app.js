$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    cache: false
  });

  $(document).on('click', '.create-modal', function(){
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Suoerhero');
  });

  $(document).on('click', '.delete_admin_images', function(){
    $.ajax({
      type  : 'DELETE',
      url   : 'images/delete',
      data  : {
        '_token'  : $('meta[name="csrf-token"]').attr('content'),
        'id'      : $(this).data('id'),
      },
      success: function(data){
        $('#image-' + data.id).remove();
      }
    });
  });

  if (window.location.pathname == '/admin/images') {
    $('#menu-images').addClass('active');
    $('#menu-orders').removeClass('active');
  }
  if (window.location.pathname == '/admin/orders') {
    $('#menu-orders').addClass('active');
    $('#menu-images').removeClass('active');
  } 

  $('.sl').slick();

  