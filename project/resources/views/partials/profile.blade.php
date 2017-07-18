
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            User Profile
        </div>
        <table class="table">
            <tr>
                <th>Username</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ Auth::user()->username }}</td>
                <td>{{ Auth::user()->type }}</td>
                <td><a href="#" class="btn btn-default">Edit</a></td>
            </tr>
        </table>
    </div>
</div>