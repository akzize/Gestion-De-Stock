var autoCloseAlerts = document.querySelectorAll(".auto-close-alert");

autoCloseAlerts.forEach(function (alert) {
  setTimeout(function () {
    alert.classList.remove("show");
  }, 3000);
});

// --------------- for showing products ------------------

const BASE_URL = 'http://localhost:8000/';

$(()=>{
  
  $.ajax({
    url: BASE_URL + 'api/selectAllProd.php',
    method: 'GET',
    dataType: 'json',
    success: function (data) {
      console.log(data);
      data.forEach(({CategoryID, Description, Name, Price, ProductID, image}) => {
        $('#products_container').append(`
        <tr>
        <td>${ProductID}</td>
        <td>${Name}</td>
          <td>${CategoryID}</td>
          <td>${Price}</td>
          <td>
            <a href="edit-product.php?id=${ProductID}" class="btn btn-primary btn-sm">Edit</a>
            <a href="delete-product.php?id=${ProductID}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        `);
      });
    },
  })

})


