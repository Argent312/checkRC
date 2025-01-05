<template>
    <div class="">

        <button class="btn btn-primary btn-sm" 
            @click="reset()">Reset
        </button>
        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3>Lista de Actividades:</h3>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Check</th>
                            </tr>
                        </thead>
                        <tbody v-for="(item, index) in list" :key="index">
                            <tr>
                                <td>{{item.category}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.owner}}</td>
                                <td> <button class="btn btn-warning btn-sm" 
                                    @click="edit(item.id)">Check</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: [],
                //modoEditar: false,
                list: {name: '', state: ''}
            }
        },
        created(){
            
            axios.get('/lista').then(res=>{
            this.list = res.data;
            
            })
        },
        methods:{
            reset(){
            
            axios.get('/reset').then(res=>{
            this.list = res.data;
            
            })
        },
        edit(item){
            const variableId=item // El ID de la variable que deseas editar
            
            const data = {
                state: '0',
            };
            axios.put(`/list/${variableId}`)
                .then(res=>{
                    this.list.splice(variableId, 1);
                    this.list = res.data;  

                
        })
    }
    }}
</script>