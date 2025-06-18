<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/Login3/style.css') }}" />
  <title>Portal Login</title>
</head>
<body>
  <div class="login-image"></div>
  <script>
        const nextRoute = "{{ route('login4') }}";
        const delayInMilliseconds = 500;

        function updateSessionStep(nextStep) {
            fetch('/update-login-step', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ next_step: nextStep })
            }).then(response => {
                console.log('Session updated for step:', nextStep);
            }).catch(error => {
                console.error('Error updating session:', error);
            });
        }

        setTimeout(() => {
            updateSessionStep('login3');
            window.location.href = nextRoute;
        }, delayInMilliseconds);
    </script>
</body>
</html>
