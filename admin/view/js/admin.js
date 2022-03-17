$(document).ready(function () {
    $('.activable').click(function () {
        $('a.activable').removeClass('active');
        $(this).addClass('active');
    });
    $('#hide-sidebar').click(function () {
        $('.sidenav').toggle('fast', function () {
            if ($('.sidenav').is(':visible')) {
                $('.content').css({ 'padding-left': '280px', "transtion": "padding-left 0.5s ease-in-out" });
                $('.content').find('#mainContainer').removeClass('container');
                $('.content').find('#mainContainer').addClass('container-fluid');
            } else {
                $('.content').css({ 'padding-left': '0px', "transtion": "padding-left 0.5s ease-in-out" });
                $('.content').find('#mainContainer').removeClass('container-fluid');
                $('.content').find('#mainContainer').addClass('container');
            };
        });
    });
    $('#currentOrders, #addOrder, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoices, #costInvoices, #allInvoices, #addClient, #addContractor, #contractors').hide();
    $('#currentOrdersToggle, #addOrderToggle, #addServiceToggle, #homeToggle, #complaintsToggle, #parcelsToggle, #clientsToggle, #allServicesToggle, #usersToggle, #settingsToggle, #companyDataToggle, #orderHistoryToggle, #addInvoiceToggle, #costInvoicesToggle, #allInvoicesToggle, #addClientToggle, #addContractorToggle, #contractorsToggle').click(function () {
        $("#home, #currentOrders, #addOrder, #addClient, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory").hide();
        let elementId = $(this).attr('id').replace("Toggle", "");
        $('#' + elementId).show();
    });
    $('#dark-mode').checked(function () {
        $('.bg-white').addClass('bg-dark');
        $('.bg-white').removeClass('bg-white');

    })
});

