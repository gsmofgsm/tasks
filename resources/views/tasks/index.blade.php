@extends('layouts.app')

@section('content')

    <div id="root">
        <h1>Tasks</h1>

        <ul class="list-group">

            <task v-for="task in tasks" :key="task.id" :task="task"></task>

        </ul>

    </div>

    @if( isset($users) )
        <hr>

        <h3>Add a new task</h3>

        @include('tasks.form')

    @endif
@endsection

@section('footerscript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.component('task', {
            props: [
                'task'
            ],

            template: `
            <li class="list-group-item">
                <a :href="usertaskurl">@{{ task.user.name }}</a>
                <a :href="taskurl">@{{ task.title }}</a>
                <input type="checkbox" v-model="task.completed" @click="updateTask">
            </li>`,

            computed: {
                usertaskurl() {
                    return '/' + this.task.user.name + '/tasks';
                },

                taskurl() {
                    return '/tasks/' + this.task.id;
                }
            },

            methods: {
                updateTask() {
                    axios.patch(
                        this.taskurl,
                        {completed: this.task.completed}
                    ).then(function(response){
                        console.log('saved successfully! ' + response.data)
                    });
                }
            }
        })

        new Vue({
            el: '#app',
            data: {
                tasks: {!! $tasks !!}
            }
        })

    </script>


@endsection