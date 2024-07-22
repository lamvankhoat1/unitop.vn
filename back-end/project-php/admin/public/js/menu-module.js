$(document).ready(function () {
    let menu = {
        'name': '', 'url_static': '', 'order_item': ''
    };
    $("[id^=menu]").change(function () {
        ['name', 'url_static', 'order_item'].forEach(function (item) {
            menu[item] = $('#menu-' + item).val();
        })
    });

    //   create auto slug
    $("#menu-name").change(function () {
        let url_suggested = $(this).val().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        url_suggested = url_suggested.toLowerCase().split(/\s+/).join("-");
        $("#menu-url_static").val(url_suggested + ".html");
    })

    $("[id^=menu]").keydown(function (event) {
        // press Enter => focus next input
        if (event.which == 13) {
            let next_input = $(this).closest(".form-group").nextAll(".form-group:first").find("input");
            if (next_input.length > 0) {
                next_input.focus();
            } else {
                ['name', 'url_static', 'order_item'].forEach(function (item) {
                    menu[item] = $('#menu-' + item).val();
                });
                $("#btn-save-list").click();
            }
        }
    })

    $("#btn-save-list").click(function () {
        ajaxAddMenu(menu);
    });

    // cancel button
    $("#btn-cancel-list").click(function(){
        ['name', 'url_static', 'order_item'].forEach(function (item) {
            $('#menu-' + item).val("");
        });
        $("#btn-edit-list, #btn-cancel-list").hide();
        $("#btn-save-list").show();
    })

    $(".delete-menu").click(function () {
        deleteMenuAction($(this));
    })

    $(".edit-menu").click(function () {
        editMenuAction($(this));
    })

    $("#btn-edit-list").click(function () {
        ['name', 'url_static', 'order_item'].forEach(function (key) {
            menu[key] = $("#menu-" + key).val();
        })
        ajaxEditMenu(menu, $(this).data("id"));
    })

    // delete many menu items
    $("#sm-block-status").click(function () {
        let value_selected = $('[name="post_status"]').val();
        if(value_selected == "delete") {
            let id_list_selected = []
            let checkbox_list_selected = $("input.checkItem").filter(":checked");
            checkbox_list_selected.each(function(key, element){
              id_list_selected.push(element.value);
            })

            ajaxDeleteManyItemsMenu(id_list_selected.join(","));

            
        }
    })

})

function ajaxAddMenu(menu) {
    $.ajax({
        url: '?mod=menu&action=ajaxAddMenu',
        method: 'POST',
        data: menu,
        dataType: 'json',
        success: function (result) {
            if ('error' in result) {
                $('.mess_error').html("");
                Object.keys(result['error']).forEach(function (key) {
                    $('.mess_error').filter('.' + key).html(result['error'][key]);
                })
            } else if ('success' in result) {
                alert(result['success']);
                $('.mess_error').html("");
                ['name', 'url_static', 'order_item'].forEach(function (item) {
                    $('#menu-' + item).val('');
                })
                $("#menu-name").focus();
                render_list_menu(result['data'])
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    })
}

function ajaxDeleteMenu(id, element) {
    $.ajax({
        url: '?mod=menu&action=ajaxDeleteMenu',
        method: 'POST',
        data: { id },
        dataType: 'html',
        success: function (result) {
            alert(result);
            element.closest("tr").remove();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    })
}

function ajaxEditMenu(menu, id) {
    menu['id'] = id;
    $.ajax({
        url: '?mod=menu&action=ajaxEditMenu',
        method: 'POST',
        data: menu,
        dataType: 'json',
        success: function (result) {
            render_list_menu(result['data']);
            $("[id^='menu-']").val("");
            $("#btn-edit-list").hide();
            $("#btn-edit-list").data("id", $(this).data("id"));
            $("#btn-cancel-list").hide();
            $("#btn-save-list").show();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    })

};

function ajaxDeleteManyItemsMenu(id_list_string) {
    $.ajax({
      url: '?mod=menu&action=ajaxDeleteManyItemsMenu',
      method: 'POST',
      data: {id_list_string},
      dataType: 'json',
      success: function(result) {
        render_list_menu(result['data']);
        alert(result['status']);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
    })
}

function render_list_menu(data) {
    let template_item_html = `
      <tr>
          <td><input type="checkbox" name="checkItem[]" class="checkItem" value="{{menu_id}}"></td>
          <td><span class="tbody-text">{{number}}</span>
          <td>
              <div class="tb-title fl-left">
                  <a href="" title="">{{menu_name}}</a>
              </div>
              <ul class="list-operation fl-right">
                  <li><a class="edit-menu" data-id="{{menu_id}}" data-name="{{menu_name}}" data-url_static="{{menu_url_static}}" data-order_item="{{menu_order_item}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                  <li><a class="delete-menu" data-id="{{menu_id}}" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
              </ul>
          </td>
          <td style="text-align: center;"><span class="tbody-text">{{menu_url_static}}</span></td>
          <td style="text-align: center;"><span class="tbody-text">{{menu_order_item}}</span></td>
      </tr>
      `;
    $("#list-menu table tbody").html("");
    data.forEach(function (object, index) {
        let html = template_item_html.replaceAll('{{number}}', index + 1);
        html = html.replaceAll('{{menu_name}}', object.name);
        html = html.replaceAll('{{menu_url_static}}', object.url_static);
        html = html.replaceAll('{{menu_order_item}}', object.order_item);
        html = html.replaceAll('{{menu_id}}', object.id);
        $("#list-menu table tbody").append(html)
    });

    $("#list-menu table tbody").find(".edit-menu").click(function () {
        editMenuAction($(this));
    });
    $("#list-menu table tbody").find(".delete-menu").click(function () {
        deleteMenuAction($(this));
    });
}


function editMenuAction(button) {
    let dataElement = button.data();
    Object.keys(dataElement).forEach(function (key) {
        if (key !== "id") {
            $("#menu-" + key).val(button.data(key));
        }
    });
    $("#btn-edit-list").show();
    $("#btn-edit-list").data("id", button.data("id"));
    $("#btn-cancel-list").show();
    $("#btn-save-list").hide();
}

function deleteMenuAction(button) {
    let id = button.data('id');
    ajaxDeleteMenu(id, button);
}