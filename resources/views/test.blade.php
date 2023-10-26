<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Popover Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <button class="btn btn-lg btn-danger" data-bs-toggle="popover"
            data-bs-content="And here's some amazing content. It's very engaging. Right?" data-bs-trigger="hover"
            type="button" title="Popover title">
            Hover to toggle popover
        </button>
    </div>

    <button class="btn btn-secondary" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="hover"
        data-bs-placement="bottom" data-bs-content="Bottom popover" type="button">
        Popover on bottom
    </button>

    <script>
        // $(function() {
        //     $('[data-bs-toggle="popover"]').popover()
        // })

        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>

</html>
