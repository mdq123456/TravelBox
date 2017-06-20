USE [DBTravelBox]
GO
/****** Object:  StoredProcedure [dbo].[SP_CLIENTE_AGREGAR_CLIENTE]    Script Date: 19/06/2017 23:40:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_CLIENTE_AGREGAR_CLIENTE]
	-- Add the parameters for the stored procedure here
	@dni nvarchar(13),
	@cuilt nvarchar(15),
	@apellidos varchar(100),
	@nombres varchar(100),
	@telefono nvarchar(16),
	@email varchar(100),
	@direccion varchar(300)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
	
	declare @codCliente int = 0

	begin try

		if ((@dni = '' and @cuilt = '') 
						or @apellidos = ''
						or @nombres = ''
						or @direccion = '')
		begin
			select 'Complete todos los datos correctamente para continuar.' as Retorno
			return
		end

		if (@dni != '')
		begin
			if ((select top 1 codCliente from Clientes where DNI = @dni) is not null)
			begin
				select 'Ya existe un Cliente con ese DNI.' as Retorno
				return
			end
		end

		if (@cuilt != '')
		begin
			if ((select top 1 codCliente from Clientes where [CUIL/CUIT] = @cuilt) is not null)
			begin
				select 'Ya existe un Cliente con ese CUIL/CUIT.' as Retorno
				return
			end
		end

		if ((select max(codCliente) from Clientes) is null)
		begin
			set @codCliente = 1;
		end
		else
		begin
			set @codCliente = (select max(codCliente)+1 from Clientes);
		end

		begin transaction
		INSERT INTO [dbo].[Clientes]
			   ([codCliente]
			   ,[DNI]
			   ,[CUIL/CUIT]
			   ,[Apellidos]
			   ,[Nombres]
			   ,[Telefono]
			   ,[Email]
			   ,[Direccion])
		 VALUES
			   (@codCliente
			   ,@dni
			   ,@cuilt
			   ,@apellidos
			   ,@nombres
			   ,@telefono
			   ,@email
			   ,@direccion)
		
		
		commit transaction

		select 'ok' as Retorno

	end try
	begin catch
		
		if (@@TRANCOUNT > 0)
		begin
			rollback tran
		end
		select ERROR_MESSAGE() as Retorno;

	end catch

END

GO
/****** Object:  StoredProcedure [dbo].[SP_CLIENTE_BUSCARCLIENTE]    Script Date: 19/06/2017 23:40:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_CLIENTE_BUSCARCLIENTE]
	@codCliente int
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select
		 codCliente,
		 DNI,
		 [CUIL/CUIT] AS CUIL,
		 Apellidos,
		 Nombres,
		 Telefono,
		 Email,
		 Direccion             
	 from Clientes where codCliente=@codCliente

END

GO
/****** Object:  StoredProcedure [dbo].[SP_CLIENTE_GETALL]    Script Date: 19/06/2017 23:40:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_CLIENTE_GETALL]
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select
		 codCliente,
		 DNI,
		 [CUIL/CUIT] as cuil,
		 Apellidos + ' ' + nombres as Nombre
	 from Clientes

END

GO
