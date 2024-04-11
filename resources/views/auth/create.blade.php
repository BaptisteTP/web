<x-layout>

<h1>Créer votre compte: </h1>
<div> 
@if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
</div>

<form id="registerForm" action="{{ route('auth.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="form-group">
                <strong>Prénom:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="Prénom">
            </div>

            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="last_name" placeholder="Nom de famille"></input>
            </div>

            <div class="form-group">
                <strong>Date de naissance: </strong>
                <input type="date" name="birthdate" value="2000-01-01" min="1970-01-01" max="2024-12-31" />
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" placeholder="jean.dupond@email.fr"></input>
            </div>

            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" placeholder="*******"></input>
            </div>

            <div class="form-group">
            <strong>Center</strong>
            <select id="center" name="center">
                    <option value="">--Please choose your center--</option>
                    <option value="Montpellier">Montpellier</option>
                    <option value="Toulouse">Toulouse</option>
                </select>
            </div>

            <div class="form-group">
            <strong>Promotion</strong>
            <select id="promotion" name="promotion">
                    <option value="">--Please choose promotion--</option>
                    <option value="CPIA1">CPIA1</option>
                    <option value="CPIA2">CPIA2</option>
                </select>
            </div>

            <div class="form-group">
            <strong>Role</strong>
            <select id="role" name="roles_id">
                    <option value="">--Please choose who you are--</option>
                    <option value="1">Student</option>
                    <option value="2">Employer</option>
                    <option value="3">Admin</option>
                </select>
            </div>

            <button type="submit">S'inscire</button>
        </div>
    </form>

   

</x-layout>