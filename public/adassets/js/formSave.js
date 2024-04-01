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
