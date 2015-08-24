<?php


/**
 * @Persistent
 * @Table('user')
 */
class User {
 
    /**
     * @Id
     * @Column(name='id')
     */
    public $id;
 
    /**
     * @Column(name='nome')
     */
    public $nome="";
    
    /**
     * @Column(name='cpf')
     */     
     public $cpf="";
     
     /**
     * @Column(name='idade', type='integer')
     */     
     public $idade=0;
     
     /**
     * @Column(name='senha')
     */
     public $senha="";
     
     /**
      * @Column(name='perfil')
      * @Join(joinTable='perfil', joinColumn='id') 
      */
     public $perfil;
               
     /**
      * @Column(name='ativo', type='boolean')
      */
     public $ativo=false;
     
}
