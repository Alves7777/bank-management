<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Categorias - Vue.js</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css">
</head>
<body>
<div id="app" class="container py-4">
    <h2>CRUD de Categorias (Vue.js)</h2>
    <div class="mb-3">
        <input v-model="form.name" class="form-control mb-2" placeholder="Nome da categoria">
        <input v-model="form.description" class="form-control mb-2" placeholder="Descrição">
        <button class="btn btn-success" @click="saveCategory">@{{ form.id ? 'Atualizar' : 'Criar' }}</button>
        <button v-if="form.id" class="btn btn-secondary ml-2" @click="resetForm">Cancelar</button>
    </div>
    <div v-if="error" class="alert alert-danger">@{{ error }}</div>
    <div v-if="success" class="alert alert-success">@{{ success }}</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cat in categories" :key="cat.id">
                <td>@{{ cat.id }}</td>
                <td>@{{ cat.name }}</td>
                <td>@{{ cat.description }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" @click="editCategory(cat)">Editar</button>
                    <button class="btn btn-danger btn-sm ml-2" @click="deleteCategory(cat.id)">Excluir</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
const { createApp } = Vue;
createApp({
    data() {
        return {
            categories: [],
            form: { id: null, name: '', description: '' },
            error: '',
            success: ''
        }
    },
    mounted() {
        this.fetchCategories();
    },
    methods: {
        fetchCategories() {
            axios.get('/api/categories')
                .then(res => this.categories = res.data)
                .catch(() => this.error = 'Erro ao carregar categorias');
        },
        saveCategory() {
            this.error = '';
            this.success = '';
            if (!this.form.name) {
                this.error = 'Nome é obrigatório';
                return;
            }
            if (this.form.id) {
                axios.put(`/api/categories/${this.form.id}`, this.form)
                    .then(() => {
                        this.success = 'Categoria atualizada!';
                        this.fetchCategories();
                        this.resetForm();
                    })
                    .catch(() => this.error = 'Erro ao atualizar');
            } else {
                axios.post('/api/categories', this.form)
                    .then(() => {
                        this.success = 'Categoria criada!';
                        this.fetchCategories();
                        this.resetForm();
                    })
                    .catch(() => this.error = 'Erro ao criar');
            }
        },
        editCategory(cat) {
            this.form = { ...cat };
            this.error = '';
            this.success = '';
        },
        deleteCategory(id) {
            if (!confirm('Tem certeza?')) return;
            axios.delete(`/api/categories/${id}`)
                .then(() => {
                    this.success = 'Categoria excluída!';
                    this.fetchCategories();
                })
                .catch(() => this.error = 'Erro ao excluir');
        },
        resetForm() {
            this.form = { id: null, name: '', description: '' };
            this.error = '';
            this.success = '';
        }
    }
}).mount('#app');
</script>
</body>
</html>
