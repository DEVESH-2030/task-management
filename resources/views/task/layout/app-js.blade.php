<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // this function to change/update task order by using drag and drop
    $(function() {
        $("#sortable").sortable({
            update: function(event, ui) {
                var itemOrder = $(this).sortable('toArray', {
                    attribute: 'data-id'
                });
                $.ajax({
                    url: '{{ route('task.updateOrder') }}',
                    method: 'POST',
                    data: {
                        order: itemOrder,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        location.reload(); // Auto reload the page after a successful update task
                    },
                    error: function() {
                        alert('Failed to update item order.');
                    }
                });
            }
        });
    });
</script>
