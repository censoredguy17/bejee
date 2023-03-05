<div class="modal fade" id="TaskEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование задачи #<?=$task['id']?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="updateTaskForm">
                    <label for="name" class="form-label">Имя пользователя</label>
                    <div class="input-group flex-nowrap mb-2">
                        <input disabled value="<?=$task['name']?>" type="text" name="name" class="form-control" placeholder="Имя" aria-label="name" aria-describedby="addon-wrapping">
                    </div>
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group flex-nowrap mb-2">
                        <input disabled value="<?=$task['email']?>" type="text" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping">
                    </div>
                    <label for="text" class="form-label">Текст задачи</label>
                    <div class="input-group mb-2">
                        <textarea name="text" class="form-control" aria-label="Text"><?=$task['text']?></textarea>
                    </div>
                    <label for="email" class="form-label">Статус</label>
                    <div class="input-group flex-nowrap mb-2">
                        <input type="hidden" name="id" value="<?=$task['id']?>">
                        <input type="checkbox" name="status" aria-describedby="addon-wrapping" <?=$task['status'] == 1 ? 'checked' : ''?>>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выйти</button>
                <button type="submit" form="updateTaskForm" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>

