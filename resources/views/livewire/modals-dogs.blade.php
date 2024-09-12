<div>
    <div id="info-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="needs-validation" novalidate id="formadddog">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="info-header-modalLabel">Add Dogs</h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label" for="dogName">Dog name</label>
                            <input type="text" class="form-control" id="dogName" placeholder="Dog name"
                                wire:model="dogName" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="breed">Breed</label>
                            <input type="text" class="form-control" id="breed" placeholder="Breed"
                                wire:model="breed" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <input type="hidden" class="form-control"  wire:model="dog_unique">
                        <div class="mb-3">
                            <label class="form-label" for="color">Color</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="color" placeholder="Color"
                                    wire:model="color" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="color" >Gender</label>
                            <div class="input-group">
                                <select class="form-select mb-3" required wire:model="gender">
                                    <option selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>   
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" placeholder="Description" id="description" wire:model="description"
                                style="height: 100px;" required></textarea>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-3">
                            <label for="dogImages" class="form-label">Dog Images</label>
                            <input class="form-control" type="file" id="dogImages" wire:model="dogImages" multiple>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" wire:click="saveDogData">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="ri-check-line h1"></i>
                        <h4 class="mt-2">Saved!</h4>
                        <p id="datatoedit"></p>
                        <button type="button" class="btn btn-light my-2" data-bs-dismiss="modal"
                            id="closeButton">Continue</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
