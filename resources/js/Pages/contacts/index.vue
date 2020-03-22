<template>

    <div class="col-md-6">
        <button class="btn btn-sm btn-primary" @click="openModal()">Add New</button>
        <table class="table table-bordered table-condensed">
            <thead>
            <tr>
                <td>Name</td>
                <td>Phone</td>
                <td>Action</td>
            </tr>
            </thead>
            <tr v-for="row in data">
                <td>{{row.name}}</td>
                <td>{{row.phone}}</td>
                <td width="130">
                    <button @click="edit(row)" class="btn btn-sm btn-primary">Edit</button>
                    <button @click="deleteRow(row)" class="btn btn-sm btn-danger">Del</button>
                </td>
            </tr>
        </table>

        <div class="modal fade" id="modal">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{editMode?'Edit':'New'}} Contact</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" required id="name" v-model="form.name"/>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="form-control" required id="phone" v-model="form.phone"/>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" @click="closeModal()">Close</button>
                        <button type="submit" class="btn btn-primary" v-show="!editMode" @click="save(form)">Save
                        </button>
                        <button type="submit" class="btn btn-primary" v-show="editMode" @click="update(form)">Update
                        </button>
                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>


</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                editMode: false,
                form: {
                    name: null,
                    phone: null,
                },
            }
        },
        methods: {
            openModal: function () {
                $('#modal').modal('show')
            },
            closeModal: function () {
                $('#modal').modal('hide')
                this.reset();
                this.editMode=false;
            },
            reset: function () {
                this.form = {
                    name: null,
                    phone: null,
                }
            },
            save: function (data) {
                this.$inertia.post('/admin/contacts', data)
                this.reset();
                this.closeModal();
                this.editMode = false;
            },
            edit: function (data) {
                this.form = Object.assign({}, data);
                this.editMode = true;
                this.openModal();
            },
            update: function (data) {
                if (!confirm('Sure')) return;
                data._method = 'PUT';
                this.$inertia.post('/admin/contacts/' + data.id, data)
                this.reset();
                this.closeModal();
            },
            deleteRow: function (data) {
                if (!confirm('Sure')) return;
                data._method = 'DELETE';
                this.$inertia.post('/admin/contacts/' + data.id, data)
                this.reset();
                this.closeModal();
            }
        }
    }
</script>