<form action="tasks" method="POST">

    {{ csrf_field() }}

    <!-- Title Form Input -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            {!! $errors->first('title', '<span class="alert alert-danger">:message</span>') !!}
        </div>

        <!-- Body Form Input -->
        <div class="form-group">
            <label for="body">Body:</label>
            <input type="text" name="body" id="body" class="form-control" value="{{ old('body') }}">
            {!! $errors->first('body', '<span class="alert alert-danger">:message</span>') !!}
        </div>

        <!-- Assign Form Input -->
        <div class="form-group">
            <label for="assign">Assigned to:</label>
            <select name="assign" id="assign" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Create Form Input -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

</form>