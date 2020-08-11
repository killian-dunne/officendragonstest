<template>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
        <a href="/"><img src="/src/images/icon.png" alt="Office & Dragons"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://www.officeanddragons.com/">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div v-if="auth" class="dropdown-header">Logged in.</div>
                <a v-if="auth" class="dropdown-item" href="/user/logout">Log out</a>
                <a v-if="!auth" class="dropdown-item" href="/user/signin">Sign in</a>
                <a v-if="!auth" class="dropdown-item" href="/user/signup">Sign up</a>
            </div>
            </li>
        </ul>
        <a v-if="auth" role="button" class="btn btn-primary" href="/company/create">Add Company</a>
        <a v-else role="button" class="btn btn-primary disabled" href="/company/create">Add Company</a>
        </div>
    </div>
  </nav>
</template>
<script>
export default {
    props: [
        'auth'
    ]
}
</script>
