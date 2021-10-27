class Custom{
    async plain_ajax(url, method, data){
        const response = await $.ajax({
            url,
            method,
            data
        })
        
        return response
    }
}