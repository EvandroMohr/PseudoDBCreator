<?php



/**
 * @Persistent
 * @Table('perfil')
 */
class Perfil {

	/**
	 * @Id
	 * @Column(name='id')
	 */
	public $id;

	/**
	 * @Column(name='descricao')
	 */
	public $descricao="";
	
}