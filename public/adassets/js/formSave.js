function saveForm(url, formData, redirectRoute = null) {
    return new Promise((resolve, reject) => {
        ajax.post(url, formData).then(response => {
            if (response.success) {
                toastr.success(response.message)
                if (redirectRoute != null) {
                    setTimeout(() => {
                        window.location.href = redirectRoute
                    }, 1000)
                } else {
                    resolve(response)
                }
            } else {
                toastr.error(response.message)
                reject(response.message)
            }
        })
    })
}

function deleteData($url, redirectRoute) {
    return new Promise((resolve, reject) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-label-secondary'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.value) {

                ajax.delete($url).then(response => {
                    if (response.success) {
                        toastr.success(response.message)
                        setTimeout(() => {
                            window.location.href = redirectRoute
                        }, 1000)
                        resolve(response)
                    } else {
                        toastr.error(response.message)
                        reject(response.message)
                    }
                })

            }
        });
    })
}
