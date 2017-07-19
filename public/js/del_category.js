var del = function () {
    $('document').ready(function () {
        $('.del').click(function () {
            parent = $(this).parent().parent();//получаем родителя нашего span. parent будет содержать объект tr (строку нашей таблицы)
            id = parent.children().first().html(); //id будет содержать id нашей категории, которое берется из первой ячейки строки
            confirm_var = confirm('Удалить категорию?');//запрашиваем подтверждение на удаление
            if (!confirm_var) return false;
            $.ajax({
                url: '/edit/categories/' + id, //url куда мы мы передаем delete запрос
                method: 'DELETE',
                data: {'_token': "{{csrf_token()}}"}, //не забываем передавать токен, или будет ошибка.
                success: function (msg) {
                    parent.remove(); // удаляем строчку tr из таблицы
                    alert('Category ' + msg + ' destroy');
                },
                error: function (msg) {
                    console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
                }
            });
        });
    });
}