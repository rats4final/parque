describe('Pruebas de CRUD de tickets', () => {
    beforeEach(() => {
      cy.login('usuario@example.com', 'password'); 
    });
  
    it('Crea un nuevo ticket', () => {
      cy.visit('/tickets/create');
      cy.get('input[name=title]').type('Nuevo ticket');
      cy.get('textarea[name=description]').type('Este es un nuevo ticket para probar');
      cy.get('button[type=submit]').click();
      cy.url().should('include', '/tickets');
      cy.get('.alert').should('contain', 'Ticket creado correctamente');
    });
  
    it('Lee un ticket', () => {
      cy.visit('/tickets/1'); // Asume que tienes un ticket con id 1
      cy.get('.ticket-title').should('contain', 'Ticket title');
    });
  
    it('Actualiza un ticket', () => {
      cy.visit('/tickets/1/edit'); // Asume que tienes un ticket con id 1
      cy.get('input[name=title]').clear().type('Título actualizado');
      cy.get('textarea[name=description]').clear().type('Descripción actualizada');
      cy.get('button[type=submit]').click();
      cy.url().should('include', '/tickets/1');
      cy.get('.alert').should('contain', 'Ticket actualizado correctamente');
    });
  
    it('Elimina un ticket', () => {
      cy.visit('/tickets/1'); // Asume que tienes un ticket con id 1
      cy.get('button.delete-ticket').click();
      cy.url().should('include', '/tickets');
      cy.get('.alert').should('contain', 'Ticket borrado exitosamente');
    });
  });
  