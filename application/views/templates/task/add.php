<div class="modal fade" id="TaskAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление задачи</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="addTaskForm">
                    <label for="name" class="form-label">Имя пользователя</label>
                    <div class="input-group flex-nowrap mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Имя" aria-label="name" aria-describedby="addon-wrapping">
                    </div>
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group flex-nowrap mb-2">
                        <input type="text" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping">
                    </div>
                    <label for="text" class="form-label">Текст задачи</label>
                    <div class="input-group mb-2">
                        <textarea name="text" class="form-control" aria-label="Text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Выйти</button>
                <button type="submit" form="addTaskForm" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>

