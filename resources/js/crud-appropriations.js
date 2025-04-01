$(document).ready(function() {
   // Add Appropriation Form Submission
   $("#addAppropriationForm").on("submit", function(event) {
       event.preventDefault();
       let formData = $(this).serialize();

       $.ajax({
           method: "POST",
           url: window.App.routes.appropriationsStore,
           data: formData,
           dataType: "json",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(response) {
               if (response.success) {
                   Swal.fire({
                       title: "Success!",
                       text: response.message,
                       icon: "success",
                       timer: 2500,
                       showConfirmButton: false
                   });
                   closeModal(); // Close add modal
                   setTimeout(() => {
                       location.reload();
                   }, 2500); // Reload after SweetAlert
               }
           },
           error: function(xhr) {
               let response = xhr.responseJSON;
               if (xhr.status === 422) {
                   let errors = Object.values(response.errors).flat().join('<br>');
                   showToast('danger', errors);
               } else {
                   showToast('danger', response?.message || 'An unexpected error occurred.');
               }
           }
       });
   });

   // Delete Button Click
   $(document).on("click", ".delete-button", function(e) {
       e.preventDefault();
       let form = $(this).closest("form");
       let url = form.attr("action");

       Swal.fire({
           title: "Are you sure?",
           text: "This action cannot be undone.",
           icon: "warning",
           showCancelButton: true,
           confirmButtonColor: "#d33",
           cancelButtonColor: "#3085d6",
           confirmButtonText: "Yes, delete it!"
       }).then((result) => {
           if (result.isConfirmed) {
               $.ajax({
                   type: "POST",
                   url: url,
                   data: form.serialize(),
                   success: function(response) {
                       Swal.fire("Deleted!", response.message, "success");
                       setTimeout(() => {
                           location.reload();
                       }, 2000);
                   },
                   error: function(xhr) {
                       let response = xhr.responseJSON;
                       Swal.fire("Error!", response?.message || "An error occurred.", "error");
                   }
               });
           }
       });
   });

   // Edit Button Click
   $(document).on("click", ".edit-button", function() {
      let id = $(this).data("id");

      $.ajax({
          url: `/appropriations/edit/${id}`,
          type: "GET",
          success: function(response) {
              if (response.success) {
                  $("#editId").val(response.data.id);
                  $("#editDocumentType").val(response.data.document_type);
                  $("#editDocumentNumber").val(response.data.document_number);
                  $("#editDateReceived").val(response.data.date_received);
                  $("#editAmount").val(response.data.amount);

                  // Ensure modal opens properly
                  openEditModal();
              } else {
                  showToast("danger", "Data not found!");
              }
          },
          error: function() {
              showToast("danger", "Error fetching data.");
          }
      });
   });



   // Update Appropriation Form Submission
   $("#editAppropriationForm").on("submit", function(event) {
      event.preventDefault();
      let id = $("#editId").val();

      console.log("Save button clicked. Form ID:", id); // Debugging

      if (!id) {
          showToast("danger", "No ID found!");
          return;
      }

      let formData = $(this).serialize();

      $.ajax({
          method: "PUT",
          url: `/appropriations/update/${id}`,
          data: formData,
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response) {
              console.log("AJAX Success Response:", response); // Debugging

              if (response.success) {
                  Swal.fire({
                     title: "Success!",
                     text: response.message,
                     icon: "success",
                     timer: 2500,
                     showConfirmButton: false
                  });
                  closeModal(); // Close add modal
                  setTimeout(() => {
                     location.reload();
                  }, 2500); // Reload after SweetAlert
              }
          },
          error: function(xhr) {
              console.log("AJAX Error:", xhr); // Debugging

              let response = xhr.responseJSON;
              if (xhr.status === 422) {
                  let errors = Object.values(response.errors).flat().join("<br>");
                  showToast("danger", errors);
              } else {
                  showToast("danger", response?.message || "An unexpected error occurred.");
              }
          }
      });
  });



   // Toast Function
   function showToast(type, message) {
      console.log("Toast Type:", type, "Message:", message); // Debugging

      const toast = $(`#toast-${type}`);
      const messageElement = toast.find('.text-sm.font-normal');

      messageElement.html(message);
      toast.removeClass('hidden').css('opacity', 0)
          .animate({ opacity: 1 }, 300);

      setTimeout(() => {
          toast.animate({ opacity: 0 }, 300, () => {
              toast.addClass('hidden');
          });
      }, 2500);
   }


   // Add Modal Functions
   function openModal() {
       $("#addAppropriationModal").removeClass("hidden");
   }

   function closeModal() {
       $("#addAppropriationModal").addClass("hidden");
       $("#addAppropriationForm")[0].reset();
   }

   // Edit Modal Functions
   function openEditModal() {
      $("#editModal").removeClass("hidden").fadeIn(200); // Smooth fade-in effect
   }

   function closeEditModal() {
      $("#editModal").fadeOut(200, function() {
          $(this).addClass("hidden");
      });
      $("#editAppropriationForm")[0].reset();
   }



   window.openModal = openModal;
   window.closeModal = closeModal;
   window.openEditModal = openEditModal;
   window.closeEditModal = closeEditModal;
});
