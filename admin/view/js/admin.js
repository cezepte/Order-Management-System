"use strict";
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
    $('#currentOrders, #addOrder, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoice, #costInvoices, #allInvoices, #addClient, #addContractor, #contractors, #previewOrder').hide();
    $('#currentOrdersToggle, #addOrderToggle, #addServiceToggle, #homeToggle, #complaintsToggle, #parcelsToggle, #clientsToggle, #allServicesToggle, #usersToggle, #settingsToggle, #companyDataToggle, #orderHistoryToggle, #addInvoiceToggle, #costInvoicesToggle, #allInvoicesToggle, #addClientToggle, #addContractorToggle, #contractorsToggle').click(function () {
        $("#home, #currentOrders, #addOrder, #addClient, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoice").hide();
        let elementId = $(this).attr('id').replace("Toggle", "");
        $('#' + elementId).show();
    });
    // $('#dark-mode').click(function () {
    //     $('.bg-white').addClass('bg-black');
    //     $('.bg-light').addClass('bg-dark');
    //     $('body').css('color', 'white');
    //     $('.bg-white').removeClass('bg-black');
    //     $('.bg-light').removeClass('bg-dark');
    // });
    $('.log-out').click(function () {
        Cookie.remove("login", { path: '/', domain: 'localhost' });
    });
    if ($(window).width() < 600) {
        $('body').load('view/mobile.php');
        $('#currentOrders, #sidebar, #more, #addOrder, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoices, #costInvoices, #allInvoices, #addClient, #addContractor, #contractors').hide();
        $('#homeToggle').click(function () {
            $('.content').hide();
            $('#home').show();
        });
        $('.activable').click(function () {
            $('a.activable').removeClass('active');
            $(this).addClass('active');
        });
        $("a[id$='Toggle']").click(function () {
            $("#home, #sidebar, #currentOrders, #addOrder, #addClient, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory").hide();
            let elementId = $(this).attr('id').replace("Toggle", "");
            $('#' + elementId).show('fast');
        });
    } else {
    }
});
