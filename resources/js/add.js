var counter=1;
        function add_more(){
            counter+=1;
            html=       '<div class="row" id="row'+counter+'">\
                            <div class="col-md-6 mb-3">\
                                <label for="">Price</label>\
                                <input type="number" class="form-control" name="price'+counter+'">\
                            </div>\
                            <div class="col-md-6 mb-3">\
                                <label for="">Description</label>\
                                <input type="text" class="form-control" name="description'+counter+'">\
                            </div>\
                            <div class="col-md-6 mb-3">\
                                <label for="">Number of Tickets</label>\
                                <input type="number" class="form-control" name="nbr'+counter+'">\
                            </div>\
                        </div>'
            var form = document.getElementById('ticket_form');
            form.innerHTML+=html;
            
                
        }