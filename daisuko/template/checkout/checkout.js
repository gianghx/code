function loadhuyen(){
                                 var tinh = document.getElementById("tinh").value;
                                 $.get("gethuyen?tp=" + tinh, function (data, status) {
                                  var sel = document.getElementById("huyen");
                                  sel.innerHTML = "<option value=''>-- Quận/huyện --</option>";
                                  var options = JSON.parse(data, true);
                                  options.forEach(function (item) {
                                      var option = document.createElement("option");
                                      option.value = item.id;
                                      option.text = item.name;
                                      sel.add(option);
                                  });
                              });

                             }
function checkgiamgia(){
  var code = document.getElementById("magg").value;
  $("#Mess").text("Mã khuyến mãi không hợp lệ");
}