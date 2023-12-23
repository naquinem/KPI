<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <RouterLink to="/summary" class="navbar-brand">Home</RouterLink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">

                <form class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Performance
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><RouterLink class="dropdown-item" to="/cycletime">Cycletime</RouterLink></li>
                                    <li><RouterLink class="dropdown-item" to="/cycletime-percentile">Cycletime Percentile</RouterLink></li>
                                    <li><RouterLink class="dropdown-item" to="/daily-hit-rate">Daily Hit Rate</RouterLink></li>
                                    <li><RouterLink class="dropdown-item" to="/excess-hours">Excess Hours</RouterLink></li>
                                    <li><RouterLink class="dropdown-item" to="/planning-request">Planning Request</RouterLink></li>
                                    <li><RouterLink class="dropdown-item" to="/repair-output">Repair Output Per Head</RouterLink></li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </form>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Nav"
    }
</script>
