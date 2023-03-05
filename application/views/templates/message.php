<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content <?=$data['result'] == 1 ? 'modal_success' : 'modal_danger'?> ">
            <div class="modal-body">
                <?=$data['message']?>
            </div>
        </div>
    </div>
</div>

