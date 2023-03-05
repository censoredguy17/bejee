<div class="container pt-4 pb-4">
    <div class="row">
        <div class="mb-4">
            <select
                    class="form-select select_tasks d-inline-block"
                    aria-label="Default select example"
                    name="sort_tasks">
                <option value="id_asc" <?=$orderBy == 'id_asc' ? 'selected' : ''?>>Id по возрастанию</option>
                <option value="id_desc" <?=$orderBy == 'id_desc' ? 'selected' : ''?>>Id по убыванию</option>
                <option value="name_asc" <?=$orderBy == 'name_asc' ? 'selected' : ''?>>Имя по алфавиту</option>
                <option value="name_desc" <?=$orderBy == 'name_desc' ? 'selected' : ''?>>Имя по алфавиту обратно</option>
                <option value="email_asc" <?=$orderBy == 'email_asc' ? 'selected' : ''?>>Email по алфавиту</option>
                <option value="email_desc" <?=$orderBy == 'email_desc' ? 'selected' : ''?>>Email по алфавиту обратно</option>
                <option value="text_asc" <?=$orderBy == 'text_asc' ? 'selected' : ''?>>Текст по алфавиту</option>
                <option value="text_desc" <?=$orderBy == 'text_desc' ? 'selected' : ''?>>Текст по алфавиту обратно</option>
            </select>
            <button class="btn btn-success d-inline-block" onClick="addTaskTemplate()">Добавить задачу +</button>
            <button class="btn btn-info d-inline-block log_in_btn <?=$_SESSION['is_admin'] == 1 ? 'd-none' : ''?>" onClick="loginTemplate()">Войти</button>
            <button class="btn btn-danger d-inline-block log_out_btn <?=$_SESSION['is_admin'] == 0 ? 'd-none' : ''?>" onClick="logout()">Выйти</button>
        </div>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">Email</th>
                <th scope="col">Текст задачи</th>
                <th scope="col">Статус</th>
                <?if($_SESSION['is_admin'] == 1){?>
                    <th scope="col">Редактировать</th>
                <?}?>
            </tr>
            </thead>
            <tbody>
            <?foreach ($tasks as $key => $task){?>
                <tr>
                    <th scope="row"><?=$task['id']?></th>
                    <td><?=$task['name']?></td>
                    <td><?=$task['email']?></td>
                    <td><?=$task['text']?></td>
                    <td>
                        <div><?=$task['status'] == 1 ? '<b>Выполнено</b>' : 'В процессе'?></div>
                        <?=$task['changed'] == 1 ? '<div>Отредактировано администратором</div>' : ''?>
                    </td>
                    <?if($_SESSION['is_admin'] == 1){?>
                        <th scope="col">
                            <button class="btn btn-light editTask" data-id="<?=$task['id']?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </th>
                    <?}?>
                </tr>
            <?}?>
            </tbody>
        </table>

        <?if($pages > 1){?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?for ($i = 1; $i <= $pages; $i++){?>
                        <li class="page-item"><a class="page-link page_link" data-id="<?=$i?>" href=""><?=$i?></a></li>
                    <?}?>
                </ul>
            </nav>
        <?}?>


    </div>
</div>